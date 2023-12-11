<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Plan as ModelsPlan;
use Exception;
use Laravel\Cashier\Subscription;
use Stripe\Plan;

class SubscriptionController extends Controller
{
    public function showPlanForm()
    {
        return view('payments.subscriptions.createPlan');
    }
    
    public function savePlan(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $amount = ($request->amount * 100);

        try {
            $plan = Plan::create([
                'amount' => $amount,
                'currency' => $request->currency,
                'interval' => $request->billing_period,
                'interval_count' => $request->interval_count,
                'product' => [
                    'name' => $request->name
                ]
            ]);
            
            ModelsPlan::create([
                'plan_id' => $plan->id,
                'name' => $request->name,
                'price' => $plan->amount,
                'billing_method' => $plan->interval,
                'currency' => $plan->currency,
                'interval_count' => $plan->interval_count,
                'deleted' => false
            ]);

        }
        catch(Exception $ex){
            dd($ex->getMessage());
        }

        return "success";
    }
    
    public function allPlans()
    {
        $yearly = ModelsPlan::where('name', 'yearly')->first();
        $monthly = ModelsPlan::where('name', 'monthly')->first();
        return view('payments.subscriptions.allPlans', compact( 'yearly', 'monthly'));
    }
    
    public function checkout($planId)
    {
        $plan = ModelsPlan::where('plan_id', $planId)->first();
        if(! $plan){
            return back()->withErrors([
                'message' => 'No se puede localizar el plan de suscripción'
            ]);
        }

        return view('payments.subscriptions.checkoutPlan', [
            'plan' => $plan,
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }
   
    public function processPlan(Request $request)
    {
        $user = auth()->user();
        $user->createOrGetStripeCustomer();
        $paymentMethod = null;
        $paymentMethod = $request->payment_method;
        if($paymentMethod != null){
            $paymentMethod = $user->addPaymentMethod($paymentMethod);
        }
        $plan = $request->plan_id;

        try {
            $user->newSubscription(
                'default', $plan
            )->create( $paymentMethod != null ? $paymentMethod->id: '');
        }
        catch(Exception $ex){
            return back()->withErrors([
                'error' => 'Unable to create subscription due to this issue '. $ex->getMessage()
            ]);
        }

        $request->session()->flash('alert-success', 'Ya estas suscrito a este plan!');
        return to_route('subscriptions.checkout', $plan);
    }
    
    public function allSubscriptions()
    {
        if (auth()->user()->onTrial('default')) {
            dd('trial');
        }

        $subscriptions = Subscription::where('user_id', auth()->id())->get();
        return view('payments.subscriptions.subscriptionsIndex', compact('subscriptions'));
    }
   
    public function cancelSubscriptions(Request $request)
    {
        $subscriptionName = $request->subscriptionName;
        if($subscriptionName){
            $user = auth()->user();
            $user->subscription($subscriptionName)->cancel();
            return 'Suscripción cancelada';
        }
    }
    
    public function resumeSubscriptions(Request $request)
    {
        $user = auth()->user();
        $subscriptionName = $request->subscriptionName;
        if($subscriptionName){
            $user->subscription($subscriptionName)->resume();
            return 'Suscripción reanudada';
        }
    }
}


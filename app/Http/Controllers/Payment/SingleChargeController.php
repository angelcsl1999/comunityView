<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SingleChargeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        return view('payments.singleCharge.home', [
            'intent' => $user->createSetupIntent(),
        ]);
    }

    public function successfulPayment()
    {
        $user = auth()->user();
        return view('payments.singleCharge.successfulPayment');
    }


    public function singleCharge(Request $request)
    {
        $amount = $request->amount;
        $amount = $amount * 100;
        $paymentMethod = $request->payment_method;

        $user = auth()->user();
        $user->createOrGetStripeCustomer();

        if ($paymentMethod != null) {
            $paymentMethod = $user->addPaymentMethod($paymentMethod);
        }

        $user->charge($amount, $paymentMethod->id);

        return to_route('payments.singleCharge.successfulPayment');
    }
}

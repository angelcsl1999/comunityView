<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Plan as ModelsPlan;
use Stripe\Plan;



return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_id');
            $table->string('name');
            $table->string('billing_method');
            $table->tinyInteger('interval_count')->default(1);
            $table->string('price');
            $table->string('currency');
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });

        //creating montly and yearly plans 

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        //monly

        $plan = Plan::create([
            'amount' => round(4.99 * 100),
            'currency' => "eur",
            'interval' => "month",
            'interval_count' => 1,
            'product' => [
                'name' => "monthly"
            ]
        ]);
        
        ModelsPlan::create([
            'plan_id' => $plan->id,
            'name' => "monthly",
            'price' => 4.99,
            'billing_method' => $plan->interval,
            'currency' => $plan->currency,
            'interval_count' => $plan->interval_count,
            'deleted' => false
        ]);

        //yearly
        $plan = Plan::create([
            'amount' => round(49.99*100),
            'currency' => "eur",
            'interval' => "year",
            'interval_count' => 1,
            'product' => [
                'name' => "yearly"
            ]
        ]);
        
        ModelsPlan::create([
            'plan_id' => $plan->id,
            'name' => "yearly",
            'price' => 49.99,
            'billing_method' => $plan->interval,
            'currency' => $plan->currency,
            'interval_count' => $plan->interval_count,
            'deleted' => false
        ]);
    
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};

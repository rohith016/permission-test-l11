<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PaymentGatewayInterface;
use App\Services\{
    PaypalPaymentService, StripePaymentService
};
class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        if(config('payment.default') == 'paypal'){
            $this->app->bind(PaymentGatewayInterface::class, PaypalPaymentService::class);
        } else if (config('payment.default') == 'stripe') {
            $this->app->bind(PaymentGatewayInterface::class, StripePaymentService::class);
        } else {
            $this->app->bind(PaymentGatewayInterface::class, config('payment.default_class'));
        }
        // register payment interface here
        // $this->app->bind(PaymentGatewayInterface::class, StripePaymentService::class);
        // add multple payment gateway here

        /**
         * handling class bind based on the request params
         */
        // $request = $this->app->make('request');
        // if($request->input('pay_type') == 'PPL') {
        //     $this->app->bind(PaymentGatewayInterface::class, PaypalPaymentService::class);
        // } else if ($request->input('pay_type') == 'STP') {
        //     $this->app->bind(PaymentGatewayInterface::class, StripePaymentService::class);
        // }


        /**
         * handling class bind based on the auth user
         */
        // $this->app->bind(PaymentGatewayInterface::class, function ($app) {
        //     $user = Auth::user();

        //     if ($user && $user->id == 1) {
        //         return new PaypalPaymentService();
        //     }

        //     return new StripePaymentService();
        // });


        /**
         * handling class bind based on the env
         */
        // if(env('PAY_GATEWAY') == 'PAYPAL'){
        //     $this->app->bind(PaymentGatewayInterface::class, PaypalPaymentService::class);
        // } else if (env('PAY_GATEWAY') == 'STRIPE') {
        //     $this->app->bind(PaymentGatewayInterface::class, StripePaymentService::class);
        // }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

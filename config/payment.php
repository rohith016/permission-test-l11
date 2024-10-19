<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Paymentgateway connection name
    |--------------------------------------------------------------------------
    |
    |
    */
    'default' => env('PAY_GATEWAY', 'paypal'),
    /*
    |--------------------------------------------------------------------------
    | Default Paymentgateway class
    |--------------------------------------------------------------------------
    |
    |
    */
    'default_class' => App\Services\StripePaymentService::class,
    /*
    |--------------------------------------------------------------------------
    | Paymentgateway Configurations
    |--------------------------------------------------------------------------
    |
    | Supported: "paypal", "stripe", "razorpay", "paystack"
    |
    */
    'gateways' => [

        'paypal' => [
            'client_id' => env('PAYPAL_CLIENT_ID'),
            'secret' => env('PAYPAL_SECRET'),
            'mode' => env('PAYPAL_MODE', 'live'),
            'version' => env('PAYPAL_VERSION', 'v1.0'),
            'currency' => env('PAYPAL_CURRENCY', 'USD'),
            'api_url' => env('PAYPAL_API_URL', 'https://api.paypal.com/v1/payments/sale'),
        ],

        'stripe' => [
            'secret' => env('STRIPE_SECRET'),
            'version' => env('STRIPE_VERSION', '2020-08-27'),
            'mode' => env('STRIPE_MODE', 'live'),
            'currency' => env('STRIPE_CURRENCY', 'USD'),
            'api_url' => env('STRIPE_API_URL', 'https://api.stripe.com/v1'),
        ],

        'razorpay' => [
            'key' => env('RAZORPAY_KEY'),
            'secret' => env('RAZORPAY_SECRET'),
        ],

        'paystack' => [
            'key' => env('PAYSTACK_KEY'),
            'secret' => env('PAYSTACK_SECRET'),
        ],


    ],

];

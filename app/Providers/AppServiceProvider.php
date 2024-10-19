<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // custom service provider created for handling payment logics
        // php artisan make:provider PaymentServiceProvider
        // check the file from app/Providers/PaymentServiceProvider.php for more details
        // laravel automaically register the service provider on booststrap/providers.php file
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

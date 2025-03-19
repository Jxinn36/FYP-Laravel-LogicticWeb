<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Validator::extend('validateUsername', function ($attribute, $value, $parameters, $validator) {
            // Your validation logic for the 'validateUsername' rule
            // Return true if the validation passes, false otherwise
            return /* your validation logic */;
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot() :void
    {
        Validator::extend('validateUsername', function ($attribute, $value, $parameters, $validator) {
            // Your validation logic goes here
            // Example: Check if the username contains only letters and numbers
            return preg_match('/^[a-zA-Z0-9]+$/', $value);
        });

        Validator::replacer('validateUsername', function ($message, $attribute, $rule, $parameters) {
            // Custom error message for the validateUsername rule
            return str_replace(':attribute', $attribute, 'The :attribute must contain only letters and numbers.');
        });
    }
}

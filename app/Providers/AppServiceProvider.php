<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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
    public function boot(): void
    {
        /*
            set pattern for route parameters
            This will ensure that the 'id' parameter in routes only accepts numeric values.
        */
        Route::pattern('id', '[0-9]+');

        /*
            share a variable with all views
            View::share('key', 'value');
        */
    }
}

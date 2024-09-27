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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        \Schema::defaultStringLength(191);
        // app()->setLocale(session('locale', config('app.locale')));


        if (session()->has('locale')) {
            \App::setLocale(session('locale'));
        }
    }
}

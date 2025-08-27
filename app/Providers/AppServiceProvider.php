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
        // Register any application services here
        // Example: $this->app->singleton(SomeService::class);
    }

    /**
     * Bootstrap any application services.
     */

    public function boot(): void
    {
        // Bootstrap any application services here
        // Example: \Illuminate\Support\Facades\Schema::defaultStringLength(191);
    }
}

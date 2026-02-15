<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;   // ✅ ADD THIS

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
        // ✅ FORCE HTTPS ON PRODUCTION (Render Fix)
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}

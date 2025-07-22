<?php

namespace Nasser\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
   /* public function boot()
    {
        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nasser-dashboard');

        // Publish assets
        $this->publishes([
            __DIR__.'/../public/assets' => public_path('vendor/nasser-dashboard/assets'),
        ], 'nasser-dashboard-assets');

        // Publish views
        $this->publishes([
            __DIR__.'/../public/assets' => public_path('vendor/nasser-dashboard/assets'),
        ], 'nasser-dashboard-assets');
    }
    */
    public function boot()
    {
        // دي عشان نعرف إذا Laravel شاف الباكدج فعلاً
        \Log::info('[NASSER_DASHBOARD] DashboardServiceProvider booted.');
    
        $this->publishes([
            __DIR__.'/../public/assets' => public_path('vendor/nasser-dashboard/assets'),
        ], 'nasser-dashboard-assets');
    
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/nasser-dashboard'),
        ], 'nasser-dashboard-views');
    }

    public function register()
    {
        //
    }
}

<?php

namespace Okotieno\DataSync;

use Illuminate\Support\ServiceProvider;

class DataSyncProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'DataSync');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/okotieno/data-sync'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        $this->app->make('Okotieno\\DataSync\\Controllers\\DataSyncController');
    }
}

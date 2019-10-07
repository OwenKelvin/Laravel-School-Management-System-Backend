<?php

namespace Okotieno\NamePrefix;

use Illuminate\Support\ServiceProvider;

class NamePrefixServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__.'/views', 'NamePrefix');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/okotieno/name-prefix'),
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
        $this->app->make('Okotieno\\NamePrefix\\Controllers\\NamePrefixController');
    }
}

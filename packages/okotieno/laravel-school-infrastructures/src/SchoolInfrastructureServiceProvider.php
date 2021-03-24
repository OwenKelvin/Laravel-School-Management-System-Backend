<?php

namespace Okotieno\SchoolInfrastructure;

use Illuminate\Support\ServiceProvider;

class SchoolInfrastructureServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__.'/views', 'SchoolInfrastructure');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/okotieno/school-infrastructures'),
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
        $this->app->make('Okotieno\\SchoolInfrastructure\\Controllers\\RoomsController');
    }
}

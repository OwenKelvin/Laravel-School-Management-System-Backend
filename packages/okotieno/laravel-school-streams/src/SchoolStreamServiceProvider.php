<?php

namespace Okotieno\SchoolStreams;

use Illuminate\Support\ServiceProvider;

class SchoolStreamServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__.'/views', 'SchoolStreams');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/okotieno/school-streams'),
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
        $this->app->make('Okotieno\\SchoolStreams\\Controllers\\SchoolStreamsController');
    }
}

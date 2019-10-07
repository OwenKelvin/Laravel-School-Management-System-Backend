<?php

namespace Okotieno\LMS;

use Illuminate\Support\ServiceProvider;

class LMSServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__.'/views', 'LMS');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/okotieno/lms'),
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
        $this->app->make('Okotieno\\LMS\\Controllers\\LibraryClassificationController');
        $this->app->make('Okotieno\\LMS\\Controllers\\LibraryBookController');
        $this->app->make('Okotieno\\LMS\\Controllers\\Api\\LibraryBookController');
    }
}

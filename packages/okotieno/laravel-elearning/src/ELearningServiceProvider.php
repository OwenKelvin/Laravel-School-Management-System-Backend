<?php

namespace Okotieno\ELearning;

use Illuminate\Support\ServiceProvider;

class ELearningServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__.'/views', 'ELearning');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/okotieno/e-learning'),
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
        $this->app->make('Okotieno\\ELearning\\Controllers\\ELearningCourseController');
    }
}

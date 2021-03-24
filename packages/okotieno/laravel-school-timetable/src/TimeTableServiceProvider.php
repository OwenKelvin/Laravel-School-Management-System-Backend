<?php

namespace Okotieno\TimeTable;

use Illuminate\Support\ServiceProvider;

class TimeTableServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__.'/views', 'TimeTable');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/okotieno/school-time-table'),
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
        $this->app->make('Okotieno\\TimeTable\\Controllers\\TimeTableController');
    }
}

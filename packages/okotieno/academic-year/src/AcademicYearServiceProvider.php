<?php

namespace Okotieno\AcademicYear;


use Illuminate\Support\ServiceProvider;

class AcademicYearServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
        $this->loadViewsFrom(__DIR__ . '/views', 'AcademicYear');
        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/okotieno/academic-years'),
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
        $this->app->make('Okotieno\\AcademicYear\\Controllers\\AcademicYearController');
    }
}

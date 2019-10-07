<?php

namespace Okotieno\StudentAdmissions;

use Illuminate\Support\ServiceProvider;

class StudentAdmissionsServicesProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__.'/views', 'StudentAdmissions');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/okotieno/school-admission'),
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
        $this->app->make('Okotieno\\StudentAdmissions\\Controllers\\StudentAdmissionIdentificationController');
    }
}

<?php

namespace Okotieno\SchoolExams;

use Illuminate\Support\ServiceProvider;

class SchoolExamsServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__.'/views', 'SchoolExams');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/okotieno/school-exams'),
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
        $this->app->make('Okotieno\\SchoolExams\\Controllers\\ExamPapersController');
    }
}

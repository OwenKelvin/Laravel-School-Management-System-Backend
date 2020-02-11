<?php

namespace Okotieno\SchoolAccounts;

use Illuminate\Support\ServiceProvider;

class SchoolAccountsServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__.'/views', 'SchoolAccounts');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/okotieno/laravel-school-accounts'),
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
        $this->app->make('Okotieno\\SchoolAccounts\\Controllers\\FinancialPlanController');
    }
}

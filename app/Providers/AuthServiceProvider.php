<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // if(!headers_sent()){
        //     header('Access-Control-Allow-Origin: http://localhost:4200');
        // }
        
        $this->registerPolicies();
        Passport::routes(null, ['prefix' => 'api/oauth']);
        // Passport::routes(null, ['middleware' => [\Barryvdh\Cors\HandleCors::class]]);
        // Route::group(['middleware' => 'cors'], function() {
        //     Passport::routes();
        // });
        
    }
}

<?php

use Illuminate\Http\Request;
use Laravel\Passport\Passport;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Passport::routes();
// Route::middleware('api')->post('oauth/token', 'Auth\\AuthController@login');
// Route::post();

// Route::group([
//     'prefix' => 'auth'
// ], function () {
    
//     Route::group([
//       'middleware' => 'auth:api'
//     ], function() {
//         Route::get('logout', 'Auth\\AuthController@logout');
//         Route::get('user', 'Auth\\AuthController@user');
//     });
// });
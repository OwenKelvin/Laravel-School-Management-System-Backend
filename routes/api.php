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
Route::middleware('auth:api')->get('/users/email', 'User\\UserApiController@getUserByEmail');

Route::middleware('auth:api')->group(function () {
   Route::get('users/auth','User\\UserApiController@authenticatedUser');
   Route::get('users/auth/logout','Auth\\AuthController@logout');
   Route::middleware('bindings')->resource('users/profile-picture', 'FileDocumentController');
   Route::patch('users/{user}', 'User\\UserController@update');
});

Route::post('/password/email', 'User\\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/token', 'User\\ResetPasswordController@tokenLogin');

Route::middleware('auth:api')->group(function () {
    Route::post('/password/reset', 'User\\ResetPasswordController@reset');
});


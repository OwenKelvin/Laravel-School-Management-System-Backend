<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 9/5/2019
 * Time: 11:15 PM
 */

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::prefix('api')->group(function () {
        Route::get('/guardians/{user}/students', 'Okotieno\\Guardians\\Controllers\\GuardiansApiController@students');
        Route::resource('/guardians', 'Okotieno\\Guardians\\Controllers\\GuardiansController');

    });
});

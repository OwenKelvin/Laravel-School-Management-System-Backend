<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 9/5/2019
 * Time: 11:15 PM
 */

use Okotieno\Guardians\Controllers\GuardiansApiController;
use Okotieno\Guardians\Controllers\GuardiansController;

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::prefix('api')->group(function () {
        Route::get('/guardians/{user}/students', [GuardiansApiController::class, 'students']);
        Route::resource('/guardians', GuardiansController::class);

    });
});

<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 9/5/2019
 * Time: 11:15 PM
 */

use Okotieno\GuardianAdmissions\Controllers\StudentGuardianApiController;

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::prefix('api')->group(function () {
        Route::prefix('student')->group(function () {
            Route::prefix('guardians')->group(function () {
                Route::get('/', [StudentGuardianApiController::class, 'get']);
            });
        });
    });
});

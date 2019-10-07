<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 9/5/2019
 * Time: 11:15 PM
 */

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::prefix('api')->group(function () {
        Route::resource(
            'admissions/students/identification',
            'Okotieno\\StudentAdmissions\\Controllers\\StudentAdmissionIdentificationController'
        );
        Route::prefix('student')->group(function () {
            Route::prefix('id-number')->group(function () {
                Route::get('/', 'Okotieno\\StudentAdmissions\\Controllers\\StudentIdNumberController@get');
                Route::get(
                    '/identification-details',
                    'Okotieno\\StudentAdmissions\\Controllers\\StudentIdNumberController@getIdentificationDetails'
                );
            });
        });
    });
});

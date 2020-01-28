<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::prefix('api')->group(function (){
        Route::resource('/academic-years', 'Okotieno\\AcademicYear\\Controllers\\AcademicYearController');
    });

    Route::get('/api/academic-years/all', 'Okotieno\\AcademicYear\\Controllers\\AcademicYearApiController@getAll');
    Route::post('/api/academic-years/{academicYear}/unit-levels', 'Okotieno\\AcademicYear\\Controllers\\AcademicYearUnitLevelController@store');
    Route::get('/api/academic-years/{academicYear}/unit-levels', 'Okotieno\\AcademicYear\\Controllers\\AcademicYearUnitLevelController@index');
});

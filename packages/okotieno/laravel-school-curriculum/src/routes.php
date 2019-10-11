<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::prefix('api/curriculum')->group( function () {
        Route::resource('unit-categories', 'Okotieno\\SchoolCurriculum\\Controllers\\UnitCategoryController');
        Route::prefix('unit-categories')->group(function (){
            Route::get('/', 'Okotieno\\SchoolCurriculum\\Controllers\\SchoolCurriculumApiController@get');
            Route::get('/all', 'Okotieno\\SchoolCurriculum\\Controllers\\SchoolCurriculumApiController@getAll');
        });
    });
});

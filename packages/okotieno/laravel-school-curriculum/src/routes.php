<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::prefix('api/curriculum')->group(function () {
        Route::prefix('units')->group(function () {
            Route::get('/all', 'Okotieno\\SchoolCurriculum\\Controllers\\UnitApiController@getAll');
        });
        Route::prefix('unit-categories')->group(function () {
            // Route::get('/', 'Okotieno\\SchoolCurriculum\\Controllers\\SchoolCurriculumApiController@get');
            Route::get('/all', 'Okotieno\\SchoolCurriculum\\Controllers\\SchoolCurriculumApiController@getAll');
        });

        Route::resource('unit-levels', 'Okotieno\\SchoolCurriculum\\Controllers\\UnitLevelController');
        Route::resource('units', 'Okotieno\\SchoolCurriculum\\Controllers\\UnitController');
        Route::resource('unit-categories', 'Okotieno\\SchoolCurriculum\\Controllers\\UnitCategoryController');
        Route::resource('class-levels', 'Okotieno\\SchoolCurriculum\\Controllers\\ClassLevelController');
        Route::resource('class-level-categories', 'Okotieno\\SchoolCurriculum\\Controllers\\ClassLevelCategoryController');
    });
});

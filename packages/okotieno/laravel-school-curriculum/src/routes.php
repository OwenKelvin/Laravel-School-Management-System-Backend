<?php

use Okotieno\SchoolCurriculum\Controllers\ClassLevelCategoryController;
use Okotieno\SchoolCurriculum\Controllers\ClassLevelController;
use Okotieno\SchoolCurriculum\Controllers\ClassLevelUnitLevelsController;
use Okotieno\SchoolCurriculum\Controllers\SchoolCurriculumApiController;
use Okotieno\SchoolCurriculum\Controllers\SemesterController;
use Okotieno\SchoolCurriculum\Controllers\UnitApiController;
use Okotieno\SchoolCurriculum\Controllers\UnitCategoryController;
use Okotieno\SchoolCurriculum\Controllers\UnitController;
use Okotieno\SchoolCurriculum\Controllers\UnitLevelController;

Route::middleware(['auth:api', 'bindings'])->group(function () {
  Route::prefix('api/curriculum')->group(function () {
    Route::prefix('units')->group(function () {
      Route::get('/all', [UnitApiController::class,'getAll']);
    });
    Route::prefix('unit-categories')->group(function () {
      // Route::get('/', SchoolCurriculumApiController@get');
      Route::get('/all', SchoolCurriculumApiController::class,'getAll');
    });

    Route::resource('unit-levels', UnitLevelController::class);
    Route::resource('units', UnitController::class);
    Route::resource('unit-categories', UnitCategoryController::class);
    Route::resource('class-levels/unit-levels', ClassLevelUnitLevelsController::class);
    Route::resource('class-levels', ClassLevelController::class);
    Route::resource('class-level-categories', ClassLevelCategoryController::class);
    Route::resource('semesters', SemesterController::class);

  });
});

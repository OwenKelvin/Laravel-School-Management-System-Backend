<?php

use Okotieno\AcademicYear\Controllers\AcademicYearApiController;
use Okotieno\AcademicYear\Controllers\AcademicYearController;
use Okotieno\AcademicYear\Controllers\AcademicYearUnitLevelController;

Route::middleware(['auth:api', 'bindings'])->group(function () {
  Route::prefix('api')->group(function () {
    Route::resource('/academic-years', AcademicYearController::class);
  });

  Route::get('/api/academic-years/all', [AcademicYearApiController::class, 'getAll']);
  Route::resource('/api/academic-years/{academicYear}/unit-levels', AcademicYearUnitLevelController::class);
  Route::get('/api/academic-years/{academicYear}/semesters', [AcademicYearApiController::class, 'semesters']);
});

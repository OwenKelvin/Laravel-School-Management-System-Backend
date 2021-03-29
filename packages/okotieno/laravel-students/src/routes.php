<?php

use Okotieno\Students\Controllers\StudentAcademicsController;
use Okotieno\Students\Controllers\StudentFeeStatementController;
use Okotieno\Students\Controllers\StudentGuardiansController;
use Okotieno\Students\Controllers\StudentsApiController;

Route::middleware(['auth:api', 'bindings'])->group(function () {
  Route::get('/api/students', [StudentsApiController::class, 'get']);
  Route::resource('/api/students/{user}/guardians', StudentGuardiansController::class);
  Route::resource('/api/students/{user}/academics', StudentAcademicsController::class);
  Route::resource('/api/students/{user}/fee-statement', StudentFeeStatementController::class);
});


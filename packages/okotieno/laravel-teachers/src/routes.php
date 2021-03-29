<?php

use Okotieno\Teachers\Controllers\TeachersController;
use Okotieno\Teachers\Controllers\TeacherSubjectsController;

Route::middleware(['auth:api', 'bindings'])->group(function () {
  Route::resource('/api/teachers', TeachersController::class);
  Route::resource('/api/teachers/{user}/subjects', TeacherSubjectsController::class);
});


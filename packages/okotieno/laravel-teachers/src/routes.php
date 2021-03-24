<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource('/api/teachers', 'Okotieno\\Teachers\\Controllers\\TeachersController');
    Route::resource('/api/teachers/{user}/subjects', 'Okotieno\\Teachers\\Controllers\\TeacherSubjectsController');
});


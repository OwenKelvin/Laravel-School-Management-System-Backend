<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource('/api/admissions/teachers', 'Okotieno\\TeacherAdmissions\\Controllers\\TeacherAdmissionsController');
});


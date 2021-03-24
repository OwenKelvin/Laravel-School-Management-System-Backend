<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource('/api/admissions/support-staffs', 'Okotieno\\SupportStaffAdmissions\\Controllers\\SupportStaffAdmissionsController');
});


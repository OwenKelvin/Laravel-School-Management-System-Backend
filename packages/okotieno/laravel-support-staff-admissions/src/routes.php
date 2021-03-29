<?php

use Okotieno\SupportStaffAdmissions\Controllers\SupportStaffAdmissionsController;

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource('/api/admissions/support-staffs', SupportStaffAdmissionsController::class);
});


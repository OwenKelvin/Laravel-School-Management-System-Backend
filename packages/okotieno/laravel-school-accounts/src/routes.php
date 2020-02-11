<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {

    Route::resource(
        '/api/accounts/academic-year/{academicYear}/financial-plan',
        'Okotieno\\SchoolAccounts\\Controllers\\FinancialPlanController');

});

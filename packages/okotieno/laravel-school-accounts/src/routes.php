<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {

    Route::resource(
        '/api/accounts/academic-year/{academicYear}/financial-plan',
        'Okotieno\\SchoolAccounts\\Controllers\\FinancialPlanController');
    Route::resource(
        '/api/accounts/financial-costs',
        'Okotieno\\SchoolAccounts\\Controllers\\FinancialCostsController');
    Route::resource(
        '/api/accounts/payment-methods',
        'Okotieno\\SchoolAccounts\\Controllers\\PaymentMethodsController');

    Route::resource(
        '/api/accounts/students/{user}/fee-payment-receipt',
        'Okotieno\\SchoolAccounts\\Controllers\\StudentPaymentReceiptController');

});

<?php

use Okotieno\SchoolAccounts\Controllers\FinancialCostsController;
use Okotieno\SchoolAccounts\Controllers\FinancialPlanController;
use Okotieno\SchoolAccounts\Controllers\PaymentMethodsController;
use Okotieno\SchoolAccounts\Controllers\StudentPaymentReceiptController;

Route::middleware(['auth:api', 'bindings'])->group(function () {

    Route::resource(
        '/api/accounts/academic-year/{academicYear}/financial-plan',
        FinancialPlanController::class);
    Route::resource(
        '/api/accounts/financial-costs',
        FinancialCostsController::class);
    Route::resource(
        '/api/accounts/payment-methods',
        PaymentMethodsController::class);

    Route::resource(
        '/api/accounts/students/{user}/fee-payment-receipt',
        StudentPaymentReceiptController::class);

});

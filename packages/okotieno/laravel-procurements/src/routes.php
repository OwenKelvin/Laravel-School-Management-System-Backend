<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::prefix('api')->group(function (){
        Route::resource('/procurements/vendors', 'Okotieno\\Procurement\\Controllers\\ProcurementVendorsController');
        Route::resource('/procurements/requests/pending-approval', 'Okotieno\\Procurement\\Controllers\\ProcurementRequestApprovalController');
        Route::resource('/procurements/requests', 'Okotieno\\Procurement\\Controllers\\ProcurementRequestController');
        Route::resource('/procurements/item-categories', 'Okotieno\\Procurement\\Controllers\\ProcurementItemsCategoryController');
        Route::get('/procurements/my-requests', 'Okotieno\\Procurement\\Controllers\\ProcurementRequestApiController@myRequests');
    });
});

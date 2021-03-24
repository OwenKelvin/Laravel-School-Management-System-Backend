<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::prefix('api')->group(function (){
        Route::resource('/procurements/tenders/{procurementTender}/fulfilled', 'Okotieno\\Procurement\\Controllers\\ProcurementTenderFulfillmentController');
        Route::resource('/procurements/tenders/{procurementTender}/bids', 'Okotieno\\Procurement\\Controllers\\ProcurementTenderBidsController');
//        Route::resource('/procurements/tender/bids', 'Okotieno\\Procurement\\Controllers\\ProcurementTenderBidsController');
        Route::resource('/procurements/tenders', 'Okotieno\\Procurement\\Controllers\\ProcurementTenderController');
        Route::resource('/procurements/vendors', 'Okotieno\\Procurement\\Controllers\\ProcurementVendorsController');
        Route::resource('/procurements/requests/pending-tendering', 'Okotieno\\Procurement\\Controllers\\ProcurementRequestTenderController');
        Route::resource('/procurements/requests/pending-approval', 'Okotieno\\Procurement\\Controllers\\ProcurementRequestApprovalController');
        Route::resource('/procurements/requests', 'Okotieno\\Procurement\\Controllers\\ProcurementRequestController');
        Route::resource('/procurements/item-categories', 'Okotieno\\Procurement\\Controllers\\ProcurementItemsCategoryController');
        Route::get('/procurements/my-requests', 'Okotieno\\Procurement\\Controllers\\ProcurementRequestApiController@myRequests');
    });
});

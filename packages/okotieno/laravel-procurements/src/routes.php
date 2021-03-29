<?php

use Okotieno\Procurement\Controllers\ProcurementItemsCategoryController;
use Okotieno\Procurement\Controllers\ProcurementRequestApiController;
use Okotieno\Procurement\Controllers\ProcurementRequestApprovalController;
use Okotieno\Procurement\Controllers\ProcurementRequestController;
use Okotieno\Procurement\Controllers\ProcurementRequestTenderController;
use Okotieno\Procurement\Controllers\ProcurementTenderBidsController;
use Okotieno\Procurement\Controllers\ProcurementTenderController;
use Okotieno\Procurement\Controllers\ProcurementTenderFulfillmentController;
use Okotieno\Procurement\Controllers\ProcurementVendorsController;

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::prefix('api')->group(function (){
        Route::resource('/procurements/tenders/{procurementTender}/fulfilled', ProcurementTenderFulfillmentController::class);
        Route::resource('/procurements/tenders/{procurementTender}/bids', ProcurementTenderBidsController::class);
//        Route::resource('/procurements/tender/bids', 'Okotieno\\Procurement\\Controllers\\ProcurementTenderBidsController');
        Route::resource('/procurements/tenders', ProcurementTenderController::class);
        Route::resource('/procurements/vendors', ProcurementVendorsController::class);
        Route::resource('/procurements/requests/pending-tendering', ProcurementRequestTenderController::class);
        Route::resource('/procurements/requests/pending-approval', ProcurementRequestApprovalController::class);
        Route::resource('/procurements/requests', ProcurementRequestController::class);
        Route::resource('/procurements/item-categories', ProcurementItemsCategoryController::class);
        Route::get('/procurements/my-requests', [ProcurementRequestApiController::class, 'myRequests']);
    });
});

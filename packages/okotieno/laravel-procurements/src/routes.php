<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::prefix('api')->group(function (){
        Route::resource('/procurements/requests', 'Okotieno\\Procurement\\Controllers\\ProcurementRequestController');
        Route::resource('/procurements/item-categories', 'Okotieno\\Procurement\\Controllers\\ProcurementItemsCategoryController');
    });
});

<?php

use Okotieno\DataSync\Controllers\DataSyncController;

Route::middleware(['auth:api', 'bindings'])->group(function () {

  Route::resource('/api/data-sync', DataSyncController::class);

});

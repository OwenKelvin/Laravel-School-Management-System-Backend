<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {

    Route::resource('/api/data-sync', 'Okotieno\\DataSync\\Controllers\\DataSyncController');

});

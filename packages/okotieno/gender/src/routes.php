<?php

use Okotieno\Gender\Controllers\GenderApiController;

Route::middleware(['auth:api', 'bindings'])->group(function () {

    Route::get('/api/genders/all', [GenderApiController::class, 'getAll']);

});

<?php

use Okotieno\SchoolInfrastructure\Controllers\RoomsController;

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource(
        '/api/school-rooms',
        RoomsController::class);
});

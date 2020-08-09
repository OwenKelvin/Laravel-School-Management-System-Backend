<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource(
        '/api/school-rooms',
        'Okotieno\\SchoolInfrastructure\\Controllers\\RoomsController');
});

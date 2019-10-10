<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {

    Route::get('/api/genders/all', 'Okotieno\\Gender\\Controllers\\GenderApiController@getAll');

});

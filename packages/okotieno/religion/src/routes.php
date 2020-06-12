<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {

    Route::resource('/api/religions', 'Okotieno\\Religion\\Controllers\\ReligionController');
    Route::get('/api/religions/all', 'Okotieno\\Religion\\Controllers\\ReligionApiController@getAll');

});

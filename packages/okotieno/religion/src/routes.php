<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {

    Route::get('/api/religions/all', 'Okotieno\\Religion\\Controllers\\ReligionApiController@getAll');

});

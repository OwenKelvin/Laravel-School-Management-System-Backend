<?php

use Okotieno\Religion\Controllers\ReligionApiController;
use Okotieno\Religion\Controllers\ReligionController;

Route::middleware(['auth:api', 'bindings'])->group(function () {

  Route::resource('/api/religions', ReligionController::class);
  Route::get('/api/religions/all', [ReligionApiController::class, 'getAll']);

});

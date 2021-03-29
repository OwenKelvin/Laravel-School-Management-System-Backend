<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {

  Route::get('/api/phones/allowed-countries', 'Okotieno\\Phone\\Controllers\\PhoneApiController@getAllowedCountries');

});


<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::get('/api/students', 'Okotieno\\Students\\Controllers\\StudentsApiController@get');
    Route::resource('/api/students/{user}/guardians', 'Okotieno\\Students\\Controllers\\StudentGuardiansController');
});


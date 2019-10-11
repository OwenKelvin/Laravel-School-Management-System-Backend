<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {

    Route::get('/api/academic-years/all', 'Okotieno\\AcademicYear\\Controllers\\AcademicYearApiController@getAll');

});

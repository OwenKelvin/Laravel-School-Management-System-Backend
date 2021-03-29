<?php

use Okotieno\SchoolStreams\Controllers\SchoolStreamsController;
use Okotieno\SchoolStreams\Controllers\StudentStreamsController;

Route::middleware(['auth:api', 'bindings'])->group(function () {
  Route::resource('/api/class-streams', SchoolStreamsController::class);
  Route::get('/api/students/{user}/streams', [StudentStreamsController::class, 'get']);
});

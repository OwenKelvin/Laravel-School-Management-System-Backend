<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource('/api/class-streams', 'Okotieno\\SchoolStreams\\Controllers\\SchoolStreamsController');
    Route::get('/api/students/{user}/streams', 'Okotieno\\SchoolStreams\\Controllers\\StudentStreamsController@get');
});

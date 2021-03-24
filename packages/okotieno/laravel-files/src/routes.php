<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource('/api/files', 'Okotieno\\Files\\Controllers\\FilesController');
});


<?php

use Okotieno\Files\Controllers\FilesController;

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource('/api/files', FilesController::class);
});


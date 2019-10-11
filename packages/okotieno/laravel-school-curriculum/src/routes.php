<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::prefix('api/curriculum')->group( function () {
        Route::resource('subject-categories', 'Okotieno\\SchoolCurriculum\\Controllers\\SchoolCurriculumController');
    });
});

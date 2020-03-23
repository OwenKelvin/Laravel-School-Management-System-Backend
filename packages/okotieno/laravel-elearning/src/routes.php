<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource('/api/e-learning/courses', 'Okotieno\\ELearning\\Controllers\\ELearningCourseController');
    Route::resource('/api/e-learning/topic-numbering', 'Okotieno\\ELearning\\Controllers\\TopicNumberingController');
});


<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource(
        '/api/e-learning/courses',
        'Okotieno\\ELearning\\Controllers\\ELearningCourseController'
    );
    Route::resource(
        '/api/e-learning/course-content',
        'Okotieno\\ELearning\\Controllers\\ELearningCourseContentController'
    );
    Route::resource(
        '/api/e-learning/topic-numbering',
        'Okotieno\\ELearning\\Controllers\\TopicNumberingController'
    );
    Route::resource(
        '/api/e-learning/course-content/topics/{eLearningTopic}/learning-outcomes',
        'Okotieno\\ELearning\\Controllers\\TopicLearningOutcomeController'
    );
});


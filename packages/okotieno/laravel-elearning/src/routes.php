<?php

use Okotieno\ELearning\Controllers\ELearningCourseContentController;
use Okotieno\ELearning\Controllers\ELearningCourseController;
use Okotieno\ELearning\Controllers\TopicLearningOutcomeController;
use Okotieno\ELearning\Controllers\TopicNumberingController;
use Okotieno\ELearning\Controllers\TopicOnlineAssessmentController;

Route::middleware(['auth:api', 'bindings'])->group(function () {
  Route::resource(
    '/api/e-learning/courses',
    ELearningCourseController::class
  );
  Route::resource(
    '/api/e-learning/course-content',
    ELearningCourseContentController::class
  );
  Route::resource(
    '/api/e-learning/topic-numbering',
    TopicNumberingController::class
  );
  Route::resource(
    '/api/e-learning/course-content/topics/{eLearningTopic}/learning-outcomes',
    TopicLearningOutcomeController::class
  );
  Route::resource(
    '/api/e-learning/course-content/topics/{eLearningTopic}/online-assessments',
    TopicOnlineAssessmentController::class
  );
});


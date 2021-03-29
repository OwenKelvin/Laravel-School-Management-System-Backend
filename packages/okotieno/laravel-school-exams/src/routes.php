<?php

use Okotieno\SchoolExams\Controllers\ExamPaperQuestionsController;
use Okotieno\SchoolExams\Controllers\ExamPapersController;

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource(
        '/api/academics/exam-papers/{examPaper}/questions',
        ExamPaperQuestionsController::class);
    Route::resource('/api/academics/exam-papers', ExamPapersController::class);
});

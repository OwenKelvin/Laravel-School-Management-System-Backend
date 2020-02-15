<?php

Route::middleware(['auth:api', 'bindings'])->group(function () {
    Route::resource(
        '/api/academics/exam-papers/{examPaper}/questions',
        'Okotieno\\SchoolExams\\Controllers\\ExamPaperQuestionsController');
    Route::resource('/api/academics/exam-papers', 'Okotieno\\SchoolExams\\Controllers\\ExamPapersController');
});

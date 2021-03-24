<?php

namespace Okotieno\SchoolExams\Traits;

use Okotieno\SchoolExams\Models\ExamPaper;

trait hasSchoolExams {
    public function createdExamPapers() {
        return $this->hasMany(ExamPaper::class, 'created_by');
    }
}

<?php

namespace Okotieno\SchoolCurriculum\Traits;

use Okotieno\StudentAdmissions\Models\Student;

trait TakenByStudents
{
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}

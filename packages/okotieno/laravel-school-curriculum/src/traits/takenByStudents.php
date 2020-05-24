<?php

namespace Okotieno\SchoolCurriculum\traits;

use Okotieno\StudentAdmissions\Models\Student;

trait takenByStudents
{
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}

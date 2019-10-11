<?php

namespace Okotieno\SchoolCurriculum;

use Illuminate\Database\Eloquent\Model;
use Okotieno\SchoolCurriculum\traits\takenByStudents;
use Okotieno\StudentAdmissions\Models\Student;

class Course extends Model
{
    use takenByStudents;
    public function units() {
        return $this->belongsToMany(Unit::class);
    }


}

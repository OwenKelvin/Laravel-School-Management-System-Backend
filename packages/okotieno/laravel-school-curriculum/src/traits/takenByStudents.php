<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 10/10/2019
 * Time: 2:18 PM
 */

namespace Okotieno\SchoolCurriculum\traits;


use Okotieno\SchoolCurriculum\Course;
use Okotieno\StudentAdmissions\Models\Student;

trait takenByStudents
{
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}

<?php

namespace Okotieno\SchoolCurriculum\Traits;

use Okotieno\SchoolCurriculum\Models\Course;

trait TakesCourses
{
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}

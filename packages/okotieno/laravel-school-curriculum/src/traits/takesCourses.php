<?php

namespace Okotieno\SchoolCurriculum\traits;

use Okotieno\SchoolCurriculum\Models\Course;

trait takesCourses
{
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}

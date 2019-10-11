<?php

namespace Okotieno\SchoolCurriculum;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function unitCategory()
    {

    }
}

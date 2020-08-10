<?php

namespace Okotieno\TimeTable\Traits;
use Okotieno\AcademicYear\Models\AcademicYear;

trait HasTimeTables
{
    public function timeTables() {
        return $this->belongsToMany(AcademicYear::class);
    }
}

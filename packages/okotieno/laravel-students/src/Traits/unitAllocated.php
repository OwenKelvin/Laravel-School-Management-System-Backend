<?php

namespace Okotieno\Students\Traits;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\AcademicYear\Models\AcademicYearUnitAllocation;
use Okotieno\SchoolCurriculum\Models\ClassLevel;
use Okotieno\SchoolCurriculum\Models\UnitLevel;

trait unitAllocated
{
    public function unitAllocation()
    {

        return $this->belongsToMany(
            AcademicYearUnitAllocation::class,
            'student_unit_allocations',

            'student_id',
            'unit_allocation_id'
            );
    }
    public function academicYear() {
        return $this->belongsTo(AcademicYear::class);
    }
    public function classLevel() {
        return $this->belongsTo(ClassLevel::class);
    }

    public function unitLevel()
    {
        return $this->belongsTo(UnitLevel::class);
    }
}

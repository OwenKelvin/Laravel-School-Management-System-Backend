<?php

namespace Okotieno\AcademicYear\Models;

use Illuminate\Database\Eloquent\Model;
use Okotieno\SchoolCurriculum\Models\UnitLevel;
use Okotieno\Students\Traits\unitAllocated;

class AcademicYearUnitAllocation extends Model
{
    use unitAllocated;
    protected $fillable = [
        'academic_year_id',
        'unit_level_id',
        'class_level_id'];

    public static function allocate($academicYearId, $classLevelId, $unitLevelId)
    {
        return self::create([
            'academic_year_id' => $academicYearId,
            'class_level_id' => $classLevelId,
            'unit_level_id' => $unitLevelId,
        ]);
    }
    public function unitLevel() {
        return $this->belongsTo(UnitLevel::class);
    }
}

<?php

namespace Okotieno\AcademicYear\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Okotieno\AcademicYear\Requests\CreateAcademicYearRequest;

class AcademicYearUnitAllocation extends Model
{
    protected $fillable = [
        'academic_year_id',
        'unit_level_id',
        'class_level_id'];

    public static function allocate($academicYearId, $classlevel, $unitLevelId)
    {
        return self::create([
            'academic_year_id' => $academicYearId,
            'class_level_id' => $classlevel,
            'unit_level_id' => $unitLevelId,
        ]);
    }
}

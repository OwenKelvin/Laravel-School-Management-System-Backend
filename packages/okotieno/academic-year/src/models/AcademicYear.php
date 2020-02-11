<?php

namespace Okotieno\AcademicYear\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Okotieno\AcademicYear\Requests\CreateAcademicYearRequest;
use Okotieno\SchoolAccounts\Traits\hasFinancialYearPlans;
use Okotieno\SchoolCurriculum\Models\ClassLevel;

class AcademicYear extends Model
{
    use hasFinancialYearPlans;
    
    public $timestamps = false;
    protected $fillable = ['name', 'start_date', 'end_date'];

    public static function createAcademicYear(CreateAcademicYearRequest $request)
    {
        $academicYear = self::create([
            'name' => $request->name,
            'start_date' => Carbon::createFromDate($request->start_date),
            'end_date' => Carbon::createFromDate($request->end_date)
        ]);
        if ($request->class_levels) {
            foreach ($request->class_levels as $class_level) {
                if (key_exists('value', $class_level) && $class_level['value'] == true) {
                    if (key_exists('subject_levels', $class_level)) {
                        foreach ($class_level['subject_levels'] as $subject_level) {
                            AcademicYearUnitAllocation::allocate($academicYear->id, $class_level['class_level_id'], $subject_level);
                        }
                    }
                }

            }
        }
        return $academicYear;
    }

    public function updateAcademicYear(CreateAcademicYearRequest $request)
    {
        $this->name = $request->name;
        $this->start_date = $request->start_date;
        $this->end_date = $request->end_date;
        $this->save();
    }

    public function classLevels()
    {
        return $this->belongsToMany(
            ClassLevel::class, 'academic_year_unit_allocations')->withPivot([
            'unit_id'
        ]);
    }

    public function classAllocations()
    {
        return $this->hasMany(AcademicYearUnitAllocation::class);
    }

}

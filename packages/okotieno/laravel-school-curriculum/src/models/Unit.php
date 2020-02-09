<?php

namespace Okotieno\SchoolCurriculum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Okotieno\SchoolCurriculum\Models\Semester;

class Unit extends Model
{
    use softDeletes;
    protected $fillable = ['name', 'abbreviation', 'active'];
    public $timestamps = false;

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function unitCategory()
    {
        return $this->belongsTo(UnitCategory::class);
    }

    public function unitLevels()
    {
        return $this->hasMany(UnitLevel::class);
    }

    public static function createSubject($request)
    {

        $unit = UnitCategory::find($request->unit_category_id)
            ->units()->create([
                'name' => $request->name,
                'abbreviation' => $request->abbr,
                'description' => $request->description,
                'active' => $request->active,
            ]);
        if ($subjectLevels = $request->unitLevels !== null) {


            foreach ($request->unitLevels as $level) {
                $unitLevel = $unit->unitLevels()->create([
                    'name' => $level['name'],
                    'level' => $level['level'],
                ]);
                if (key_exists('semesters', $level)) {
                    $semesters = $level['semesters'];
                    if ($semesters !== null && is_array($semesters)) {
                        foreach ($semesters as $semester) {
                            $unitLevel->semesters()->save(Semester::find($semester));
                        }
                    }
                }
            }
        }


        $unit->unitLevels;
        return $unit;

    }

    public static function updateSubject(Unit $unit, Request $request)
    {
        $unit->name = $request->name;
        $unit->active = $request->active;
        $unit->abbreviation = $request->abbr;
        $unit->essence_statement = $request->description;
        $unit->save();
        if ($request->unitLevels && is_array($request->unitLevels)) {

            foreach ($request->unitLevels as $unitLevel) {
                if (key_exists('id', $unitLevel) && $unitLevel['id'] > 0) {
                    $unitLevelSaved = $unit->unitLevels()->find($unitLevel['id']);
                    $unitLevelSaved->update([
                        'name' => $unitLevel['name'],
                        'level' => $unitLevel['level'],
                    ]);
                } else {
                    $unitLevelSaved = $unit->unitLevels()->create([
                        'name' => $unitLevel['name'],
                        'level' => $unitLevel['level'],
                    ]);

                }
                $semesters = $unitLevel['semesters'];
                $unitLevelSaved->semesters()->detach();
                if ($semesters !== null && is_array($semesters)) {
                    foreach ($semesters as $semester) {
                        $unitLevelSaved->semesters()->save(Semester::find($semester));
                    }
                }


            }
        }
        $unit->unitLevels;
        return $unit;
    }

}

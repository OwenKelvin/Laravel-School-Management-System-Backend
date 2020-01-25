<?php

namespace Okotieno\SchoolCurriculum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

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
    public static function createSubject($request){

        $unit = UnitCategory::find($request->unit_category_id)
            ->units()->create([
                'name' => $request->name,
                'abbreviation' => $request->abbr,
                'description' => $request->description,
                'active' => $request->active,
            ]);
        if ($subjectLevels = $request->unitLevels !== null){
            foreach ($request->unitLevels as $level){
                $unit->unitLevels()->create([
                    'name' => $level['name'],
                    'level' => $level['level'],
                ]);
            }
        }

        $unit->unitLevels;
        return $unit;

    }

    public static function updateSubject(Unit $unit, Request $request) {
        $unit->name = $request->name;
        $unit->active = $request->active;
        $unit->abbreviation = $request->abbr;
        $unit->essence_statement = $request->description;
        $unit->save();
        if ($request->unitLevels) {
            if(is_array($request->unitLevels)){
                foreach ($request->unitLevels as $unitLevel) {
                    if (key_exists('id', $unitLevel)) {
                        $unit->unitLevels()->find($unitLevel['id'])->update([
                            'name' => $unitLevel['name'],
                            'level' => $unitLevel['level'],
                        ]);
                    } else {
                        $unit->unitLevels()->create([
                            'name' => $unitLevel['name'],
                            'level' => $unitLevel['level'],
                        ]);
                    }

                }
            }
        }
        $unit->unitLevels;
        return $unit;
    }

}

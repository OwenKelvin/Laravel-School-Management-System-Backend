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
        if ($subjectLevels = $request->subjectLevels !== null){
            foreach ($request->subjectLevels as $level){
                $unit->unitLevels()->create([
                    'name' => $level['name']
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
        if ($request->subjectLevels) {
            if(is_array($request->subjectLevels)){
                foreach ($request->subjectLevels as $subjectLevel) {
                    if (key_exists('id', $subjectLevel)) {
                        $unit->unitLevels()->find($subjectLevel['id'])->update([
                            'name' => $subjectLevel['name']
                        ]);
                    } else {
                        $unit->unitLevels()->create([
                            'name' => $subjectLevel['name']
                        ]);
                    }

                }
            }
        }
        $unit->unitLevels;
        return $unit;
    }

}

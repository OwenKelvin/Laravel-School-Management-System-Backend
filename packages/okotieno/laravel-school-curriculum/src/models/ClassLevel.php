<?php

namespace Okotieno\SchoolCurriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Okotieno\SchoolCurriculum\Requests\CreateClassLevelRequest;

class ClassLevel extends Model
{
    use softDeletes;
    protected $fillable = ['name', 'abbreviation', 'active'];
    public $timestamps = false;
    protected $hidden = ['deleted_at'];

    public static function createClassLevel(CreateClassLevelRequest $request)
    {
        $classLevelCategory = ClassLevelCategory::find($request->class_level_category_id);
        $classLevel = $classLevelCategory->classLevels()->create([
            'abbreviation' => $request->abbr,
            'name' => $request->name,
            'active' => $request->active,
        ]);
        return $classLevel;
    }

}

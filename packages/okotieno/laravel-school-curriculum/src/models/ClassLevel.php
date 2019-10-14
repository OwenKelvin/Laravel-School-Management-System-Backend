<?php

namespace Okotieno\SchoolCurriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Okotieno\SchoolCurriculum\Requests\CreateClassLevelRequest;

class ClassLevel extends Model
{
    use softDeletes;
    protected $fillable = ['name', 'abbr'];
    public $timestamps = false;
    protected $hidden = ['deleted_at'];
    public static function createClassLevel(CreateClassLevelRequest $request)
    {
        $classLevel = self::create($request->all() );
       return $classLevel;
    }

}

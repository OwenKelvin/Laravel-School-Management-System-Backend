<?php

namespace Okotieno\SchoolCurriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Okotieno\SchoolCurriculum\Requests\CreateClassLevelCategoryRequest;

class ClassLevelCategory extends Model
{
    use softDeletes;
    protected $fillable = ['name', 'abbr'];
    public $timestamps = false;
    protected $hidden = ['deleted_at'];

    public static function createClassLevelCategory(CreateClassLevelCategoryRequest $request)
    {
        $classLevelCategory = self::create($request->all());
        return $classLevelCategory;
    }

}

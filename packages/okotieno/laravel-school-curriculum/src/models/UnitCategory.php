<?php

namespace Okotieno\SchoolCurriculum\Models;

use App\Traits\canBeActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;
use Okotieno\SchoolCurriculum\Requests\CreateUnitCategoryRequest;

class UnitCategory extends Model
{
    protected $hidden = ['deleted_at'];
    use canBeActive, softDeletes;
    public $timestamps = false;
    protected $fillable = ['name', 'active', 'description'];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public static function createCategory(CreateUnitCategoryRequest $request)
    {
        $unitCategory = UnitCategory::create([
            'name' => $request->name,
            'active' => $request->active,
            'description' => $request->description
        ]);
        if ($request->units) {
            foreach ($request->units as $key => $unitRequest) {
                $unit = $unitCategory->units()->create([
                    'name' => $unitRequest['name'],
                    'abbreviation' => $unitRequest['abbr'],
                    'active' => $unitRequest['active'],
                ]);
                if (key_exists('subjectLevels', $unitRequest)) {
                    foreach ($unitRequest['subjectLevels'] as $subjectLevel) {
                        $unit->unitLevels()->create([
                            'name' => $subjectLevel['name']
                        ]);
                    }
                }
                $unitCategory = UnitCategory::find($unitCategory->id);
                $unitCategory->units[$key]->unitLevels;
            }
            $unitCategory->units;

        }
        return $unitCategory;
    }
}

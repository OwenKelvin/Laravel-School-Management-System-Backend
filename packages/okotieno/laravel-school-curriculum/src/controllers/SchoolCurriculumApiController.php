<?php

namespace Okotieno\SchoolCurriculum\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\canBeActive;
use Illuminate\Http\Request;
use Okotieno\Religion\Models\Religion;
use Okotieno\SchoolCurriculum\UnitCategory;

class SchoolCurriculumApiController extends Controller
{
    public function get(Request $request)
    {
        if ($request->active == 1) {
            return UnitCategory::active()->get();
        }
        if ($request->id) {
            $unitCategory = UnitCategory::find($request->id);
            return $unitCategory;
        }
        return $this->getAll();
    }

    public function getAll()
    {
        return UnitCategory::all();
    }
}

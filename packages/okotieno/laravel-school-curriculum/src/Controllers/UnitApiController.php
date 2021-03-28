<?php

namespace Okotieno\SchoolCurriculum\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\canBeActive;
use Illuminate\Http\Request;
use Okotieno\Religion\Models\Religion;
use Okotieno\SchoolCurriculum\Models\Unit;
use Okotieno\SchoolCurriculum\Models\UnitCategory;

class UnitApiController extends Controller
{

    public function getAll()
    {
        return Unit::all();
    }
}

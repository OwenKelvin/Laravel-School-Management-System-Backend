<?php

namespace Okotieno\AcademicYear\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\Religion\Models\Religion;

class AcademicYearApiController extends Controller
{
    public function getAll()
    {
        return [];
    }
    public function semesters(AcademicYear $academicYear) {
      return $academicYear->semesters;
    }
}

<?php


namespace Okotieno\TimeTable\Controllers;

use App\Http\Controllers\Controller;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\TimeTable\Models\TimeTable;

class TimeTableLessonsController extends Controller
{
    public function index(AcademicYear $academicYear, TimeTable $timeTable)
    {
        return response()->json($timeTable->lessons);
    }

}

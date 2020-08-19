<?php

namespace Okotieno\TimeTable\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\TimeTable\Models\TimeTable;
use Okotieno\TimeTable\Models\TimeTableTimingTemplate;
use Okotieno\AcademicYear\Models\AcademicYear;

class TimeTableTimingsController  extends Controller
{
    public function index(AcademicYear $academicYear, TimeTable $timeTable) {
        $template = TimeTableTimingTemplate::find($timeTable->time_table_timing_template_id);
        $response = $template->timings;

        return response()->json($response);
    }

}

<?php

namespace Okotieno\TimeTable\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\TimeTable\Models\TimeTable;
use Okotieno\TimeTable\Models\TimeTableTimingTemplate;

class AcademicYearTimeTableController extends Controller
{
    public function index(AcademicYear $academicYear)
    {

        return response()->json($academicYear->timeTables);
    }

    public function show(AcademicYear $academicYear, TimeTable $timeTable)
    {
        $timeTable['timing'] = TimeTableTimingTemplate::find($timeTable->time_table_timing_id);
        return response()->json($timeTable);
    }

    public function store(AcademicYear $academicYear, Request $request)
    {
        $timetable = $academicYear->timeTables()->create([
            'description' => $request['description'],
            'time_table_timing_template_id' => $request['timing']
        ]);
        return [
            'saved' => true,
            'message' => 'TimeTable Created Successfully',
            'data' => $timetable
        ];
    }
}

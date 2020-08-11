<?php

namespace Okotieno\TimeTable\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\AcademicYear\Models\AcademicYear;

class AcademicYearTimeTableController extends Controller
{
    public function index(AcademicYear $academicYear)
    {

        return response()->json($academicYear->timeTables);
    }

    public function show(AcademicYear $academicYear)
    {
        return response()->json([

        ]);
    }

    public function store(AcademicYear $academicYear, Request $request)
    {
        $academicYear->timeTables()->create(['time_table_timing_id' => 1]);
        return [
            'saved' => true,
            'message' => 'TimeTable Created Successfully'
        ];
    }
}

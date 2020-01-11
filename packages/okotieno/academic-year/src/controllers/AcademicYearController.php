<?php

namespace Okotieno\AcademicYear\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\AcademicYear\Requests\CreateAcademicYearRequest;
use Okotieno\SchoolCurriculum\Models\ClassLevel;
use Okotieno\SchoolCurriculum\Unit;
use Okotieno\SchoolCurriculum\UnitLevel;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AcademicYear::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAcademicYearRequest $request
     * @return JsonResponse
     */
    public function store(CreateAcademicYearRequest $request)
    {
        return response()->json(AcademicYear::createAcademicYear($request));
    }

    /**
     * Display the specified resource.
     *
     * @param AcademicYear $academicYear
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicYear $academicYear, Request $request)
    {
        $returnAcademicYear = [
            'id' => $academicYear->id,
            'name' => $academicYear->name,
            'start_date' => $academicYear->start_date,
            'end_date' => $academicYear->end_date,
            'class_level_allocations' => []
        ];
        if ($request->class_levels == 1) {
            $classLevels = [];
            foreach ($academicYear->classAllocations->groupBy('class_level_id')->toArray() as $key => $classAllocation) {

                $classLevel = ClassLevel::find($key);
                $units = [];
                foreach ($classAllocation as $_classAllocation) {
                    $unitLevel = UnitLevel::find($_classAllocation['unit_level_id']);
                    $unit = [
                        'id' => $_classAllocation['id'],
                        'name' => $unitLevel->unit->name,
                        'level' => $unitLevel->name 
                    ];
                    $units[] = $unit;
                }
                $classLevels[] = [
                    'id' => $classLevel->id,
                    'name' => $classLevel->name,
                    'abbreviation' => $classLevel->abbreviation,
                    'units' => $units
                ];
            }
            $returnAcademicYear['class_level_allocations'] = $classLevels;
        }
        return response()->json($returnAcademicYear);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param AcademicYear $academicYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicYear $academicYear)
    {
        return response()->json($academicYear->updateClassLevelCategory($academicYear, $request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AcademicYear $academicYear
     * @return void
     * @throws \Exception
     */
    public function destroy(AcademicYear $academicYear)
    {
        $academicYear->delete();
    }
}

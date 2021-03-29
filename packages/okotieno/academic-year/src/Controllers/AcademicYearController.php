<?php

namespace Okotieno\AcademicYear\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\AcademicYear\Requests\CreateAcademicYearRequest;
use Okotieno\SchoolCurriculum\Models\ClassLevel;
use Okotieno\SchoolCurriculum\Models\UnitLevel;

class AcademicYearController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\jsonResponse
   */
  public function index(): jsonResponse
  {
    return response()->json(AcademicYear::all());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */

  /**
   * Store a newly created resource in storage.
   *
   * @param CreateAcademicYearRequest $request
   * @return JsonResponse
   */
  public function store(CreateAcademicYearRequest $request): JsonResponse
  {
    return response()->json(AcademicYear::createAcademicYear($request));
  }

  /**
   * Display the specified resource.
   *
   * @param AcademicYear $academicYear
   * @param Request $request
   * @return jsonResponse
   */
  public function show(AcademicYear $academicYear, Request $request): jsonResponse
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
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param AcademicYear $academicYear
   * @return jsonResponse
   */
  public function update(Request $request, AcademicYear $academicYear): JsonResponse
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

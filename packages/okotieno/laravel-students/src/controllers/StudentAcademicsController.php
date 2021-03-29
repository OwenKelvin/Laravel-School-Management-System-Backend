<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 12/12/2019
 * Time: 11:28 AM
 */

namespace Okotieno\Students\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Okotieno\AcademicYear\Models\AcademicYearUnitAllocation;


class StudentAcademicsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param Request $request
   * @param User $user
   * @return JsonResponse
   */
  public function index(Request $request, User $user)
  {
    $response = [];
    foreach ($user->student->unitAllocation->groupBy('academic_year_id') as $unitAllocation) {
      $classLevels = [];
      foreach ($unitAllocation->groupBy('class_level_id') as $classLevel) {
        $units = [];
        $stream = $user->student->streams()
          ->where('academic_year_id', $unitAllocation[0]->academicYear->id)
          ->where('class_level_id', $classLevel[0]->classLevel->id)->first();
        foreach ($classLevel as $item) {
          $units[] = $item->unitLevel;
        }
        $classLevels[] = [
          'stream_id' => $stream == null ? null : $stream->id,
          'stream_name' => $stream == null ? null : $stream->name,
          'stream_abbreviation' => $stream == null ? null : $stream->abbreviation,
          'class_level_id' => $classLevel[0]->classLevel->id,
          'class_level_name' => $classLevel[0]->classLevel->name,
          'units' => $units
        ];
      }

      $response[] = [
        'academic_year_id' => $unitAllocation[0]->academicYear->id,
        'academic_year_name' => $unitAllocation[0]->academicYear->name,
        'class_levels' => $classLevels,
//                'raw' => $unitAllocation
      ];
    }
    return response()->json($response);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   * @param Request $request
   * @param User $user
   * @return JsonResponse
   */
  public function store(Request $request, User $user)
  {
    $user->student->updateStream($user, $request->stream_id, $request->academic_year_id, $request->class_level_id);

    foreach ($request->unit_levels as $allocation) {
      $user
        ->student
        ->unitAllocation()
        ->save(AcademicYearUnitAllocation::find($allocation));
    }

    return response()->json([
      'saves' => true,
      'message' => 'Successfully allocated units to the student',
      'data' => $user->student->unitAllocation
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param User $user
   * @param $academicYear
   * @return JsonResponse
   */
  public function show(User $user, $academicYear, Request $request)
  {
    $unitLevels = DB::table('users')
      ->where('users.id', $user->id)
      ->leftJoin('students', function ($join) {
        $join->on('students.user_id', '=', 'users.id');
      })
      ->leftJoin('student_unit_allocations', function ($join) {
        $join->on('student_unit_allocations.student_id', '=', 'students.id');
      })
      ->leftJoin('academic_year_unit_allocations', function ($join) {
        $join->on('student_unit_allocations.unit_allocation_id', '=', 'academic_year_unit_allocations.id');
      })
      ->leftJoin('unit_levels', function ($join) {
        $join->on('academic_year_unit_allocations.unit_level_id', '=', 'unit_levels.id');
      })
      ->leftJoin('class_levels', function ($join) {
        $join->on('academic_year_unit_allocations.class_level_id', '=', 'class_levels.id');
      })
      ->where('academic_year_unit_allocations.academic_year_id', $academicYear)
      ->select([
        'unit_levels.id as unit_level_id',
        'unit_levels.name as unit_level_name',
        'class_levels.id as class_level_id',
        'class_levels.name as class_level_name'
      ])
      ->distinct();
    if ($request->class_level_id !== null) {
      $unitLevels = $unitLevels->where(
        'academic_year_unit_allocations.class_level_id',
        $request->class_level_id
      );
    }

    return response()->json($unitLevels->get());

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @return JsonResponse
   */
  public function update(User $user, $academicYearId, Request $request)
  {
    $user->student->updateStream($user, $request->stream, $academicYearId, $request->classLevelId);

    foreach ($request->unitLevels as $unitLevel) {
      $academicYearUnitAllocation = AcademicYearUnitAllocation::where([
        'academic_year_id' => $academicYearId,
        'class_level_id' => $request->classLevelId,
        'unit_level_id' => $unitLevel['id']
      ])->first();
      $allocation = $user->student->unitAllocation()
        ->where('unit_level_id', $unitLevel['id'])
        ->where('academic_year_id', $academicYearId);
      if ($unitLevel['value'] === true && $allocation->first() === null) {
        $allocation->save($academicYearUnitAllocation);
      }

      if ($unitLevel['value'] === false && $allocation->first() != null) {
        $allocation->detach($academicYearUnitAllocation->id);
      }
    }

    return response()->json([
      'saved' => true,
      'message' => 'Academic Details Successfully saved'
    ]);

  }

  /**
   * Remove the specified resource from storage.
   *
   * @return void
   * @throws Exception
   */
  public function destroy()
  {

  }
}

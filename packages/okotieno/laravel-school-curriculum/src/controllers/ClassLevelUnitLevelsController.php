<?php

namespace Okotieno\SchoolCurriculum\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\SchoolCurriculum\Requests\CreateClassLevelRequest;
use Okotieno\SchoolCurriculum\Models\ClassLevel;


class ClassLevelUnitLevelsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function index(Request $request)
  {
    $classLevels = ClassLevel::all();
    foreach ($classLevels as $key => $classLevel) {
      $classLevels[$key]->taughtUnits;
    }
    return response()->json($classLevels);
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
   * @param CreateClassLevelRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function store(Request $request)
  {
    ClassLevel::saveUnitAllocations($request->all());
    return response()->json([
      'saved' => true,
      'message' => 'Successfully saved Allocations'
    ]);

  }

  /**
   * Display the specified resource.
   *
   * @param ClassLevel $classLevel
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function show(ClassLevel $classLevel, Request $request)
  {
    return response()->json($classLevel);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param ClassLevel $classLevel
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function update(ClassLevel $classLevel)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param ClassLevel $classLevel
   * @return void
   * @throws \Exception
   */
  public function destroy(ClassLevel $classLevel)
  {

  }
}

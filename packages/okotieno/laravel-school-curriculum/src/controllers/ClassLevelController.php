<?php

namespace Okotieno\SchoolCurriculum\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Okotieno\SchoolCurriculum\Requests\CreateClassLevelRequest;
use Okotieno\SchoolCurriculum\Models\ClassLevel;
use Okotieno\SchoolCurriculum\Requests\UpdateClassLevelRequest;


class ClassLevelController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param Request $request
   * @return JsonResponse
   */
    public function index(Request $request)
    {
        $classLevels = ClassLevel::all();
        if ($request->units) {
            foreach ($classLevels as $classLevel) {
                $classLevel->units;
            }
        }
        if ($request->include_levels) {
            foreach ($classLevels as $key => $classLevel) {
                if ($request->academic_year_id) {
                    $classLevels[$key]['unit_levels'] = $classLevel->unitLevels()
                      -> wherePivot('academic_year_id', '=', $request->academic_year_id)->get();
                    foreach ($classLevels[$key]['unit_levels'] as $key1 => $unitLevel) {
                        $classLevels[$key]['unit_levels'][$key1]->semesters;
                    }
                } else {

                    foreach ($classLevel->unitLevels as $key1 => $unitLevel) {
                        $classLevel->unitLevels['unit_levels'][$key1]->semesters;
                    }
                }


            }
        }
        return response()->json($classLevels);
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
     *
     * @param CreateClassLevelRequest $request
     * @return JsonResponse
     */
    public function store(CreateClassLevelRequest $request)
    {
        return response()->json(ClassLevel::createClassLevel($request));

    }

    /**
     * Display the specified resource.
     *
     * @param ClassLevel $classLevel
     * @param Request $request
     * @return JsonResponse
     */
    public function show(ClassLevel $classLevel, Request $request)
    {
        return response()->json($classLevel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClassLevel $classLevel
     * @param  \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function update(ClassLevel $classLevel, UpdateClassLevelRequest $request)
    {
        return response()->json(ClassLevel::updateClassLevel($classLevel, $request));
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
        $classLevel->delete();
    }
}

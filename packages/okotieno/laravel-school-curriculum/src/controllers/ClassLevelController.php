<?php

namespace Okotieno\SchoolCurriculum\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\SchoolCurriculum\Requests\CreateClassLevelRequest;
use Okotieno\SchoolCurriculum\Models\ClassLevel;
use Okotieno\SchoolCurriculum\Requests\UpdateClassLevelRequest;
use Okotieno\SchoolCurriculum\UnitCategory;

class ClassLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
                } else {
                    $classLevel->unitLevels;
                }

            }
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
     * @return Request|CreateUnitRequest
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
     * @return \Illuminate\Http\Response
     */
    public function show(ClassLevel $classLevel, Request $request)
    {
        return response()->json($classLevel);
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
     * @param ClassLevel $classLevel
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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

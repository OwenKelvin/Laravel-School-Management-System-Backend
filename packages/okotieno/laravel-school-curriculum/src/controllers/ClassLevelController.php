<?php

namespace Okotieno\SchoolCurriculum\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\SchoolCurriculum\Requests\CreateClassLevelRequest;
use Okotieno\SchoolCurriculum\Models\ClassLevel;
use Okotieno\SchoolCurriculum\UnitCategory;

class ClassLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param CreateUnitRequest $request
     * @return Request|CreateUnitRequest
     */
    public function store(CreateClassLevelRequest $request)
    {
        return response()->json(ClassLevel::createClassLevel($request));
    }

    /**
     * Display the specified resource.
     *
     * @param Unit $unit
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
     * @param  int  $id
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
     * @param Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassLevel $unit)
    {
        return response()->json(ClassLevel::updateClassLevel($unit, $request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Unit $unit
     * @return void
     * @throws \Exception
     */
    public function destroy(ClassLevel $unit)
    {
        $unit->delete();
    }
}

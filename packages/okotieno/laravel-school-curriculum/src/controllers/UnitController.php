<?php

namespace Okotieno\SchoolCurriculum\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\SchoolCurriculum\Requests\CreateUnitRequest;
use Okotieno\SchoolCurriculum\Unit;
use Okotieno\SchoolCurriculum\UnitCategory;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $units = Unit::all();
        if ($request->unit_levels) {
            foreach ($units as $index => $unit) {
                $units[$index]->unitLevels;
            }
        }
        return response()->json($units);
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
    public function store(CreateUnitRequest $request)
    {
        return response()->json(Unit::createSubject($request));
    }

    /**
     * Display the specified resource.
     *
     * @param Unit $unit
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit, Request $request)
    {
        if ($request->include_unit_levels == 1) {
            $unit->unitLevels;
            foreach ($unit->unitLevels as $key => $unitLevel) {
                $unit->unitLevels[$key]->semesters;
            }

        };
        return response()->json($unit);
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
     * @param Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        return response()->json(Unit::updateSubject($unit, $request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Unit $unit
     * @return void
     * @throws \Exception
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
    }
}

<?php

namespace Okotieno\SchoolCurriculum\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\SchoolCurriculum\Unit;
use Okotieno\SchoolCurriculum\UnitLevel;

class UnitLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $unitLevels = [];
        if($request->unit) {
            return Unit::find($request->unit)->unitLevels->map(function ($itemInner) {
                // return $itemInner;
                return [
                    'id' => $itemInner->id,
                    'name' => $itemInner->unit->name." ". $itemInner->name ];
            });
        }

        foreach (Unit::all() as $item) {
            // return $item;
            $items = $item->unitLevels->map(function ($itemInner) use ($item) {
               // return $itemInner;
                return [
                    'id' => $itemInner->id,
                    'name' => $item->name." ". $itemInner->name ];
            });
            $unitLevels = array_merge($unitLevels,$items->toArray());
        }
        return response()->json($unitLevels);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UnitLevel $unitLevel
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(UnitLevel $unitLevel)
    {
        return response()->json($unitLevel->delete());
    }
}

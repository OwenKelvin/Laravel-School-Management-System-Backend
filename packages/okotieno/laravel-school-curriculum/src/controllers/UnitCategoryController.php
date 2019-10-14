<?php

namespace Okotieno\SchoolCurriculum\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\SchoolCurriculum\Requests\CreateUnitCategoryRequest;
use Okotieno\SchoolCurriculum\UnitCategory;

class UnitCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->active == 1) {
            return response()->json(UnitCategory::active()->get());
        }
        if ($request->id) {
            $unitCategory = response()->json(UnitCategory::find($request->id));
            return $unitCategory;
        }
        return response()->json(UnitCategory::all());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUnitCategoryRequest $request)
    {
        return response()->json(UnitCategory::createCategory($request));
    }

    /**
     * Display the specified resource.
     *
     * @param UnitCategory $unitCategory
     * @param Request $request
     * @return UnitCategory
     */
    public function show(UnitCategory $unitCategory, Request $request)
    {
        if ($request->units == 1){
            $unitCategory->units;
        }
        return $unitCategory;
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unitCategory = UnitCategory::find($id);
        $unitCategory->name = $request->name;
        $unitCategory->active = $request->active;
        $unitCategory->save();
        return $unitCategory;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unitCategory = UnitCategory::find($id);
        $unitCategory->delete();
    }
}

<?php

namespace Okotieno\SchoolCurriculum\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\SchoolCurriculum\Requests\CreateClassLevelCategoryRequest;
use Okotieno\SchoolCurriculum\Models\ClassLevelCategory;

class ClassLevelCategoryController extends Controller
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
    public function store(CreateClassLevelCategoryRequest $request)
    {
        return response()->json(ClassLevelCategory::createClassLevelCategory($request));
    }

    /**
     * Display the specified resource.
     *
     * @param ClassLevelCategory $classLevelCategory
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(ClassLevelCategory $classLevelCategory, Request $request)
    {
        return response()->json($classLevelCategory);
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
     * @param ClassLevelCategory $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassLevelCategory $unit)
    {
        return response()->json(ClassLevelCategory::updateClassLevelCategory($unit, $request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ClassLevelCategory $unit
     * @return void
     * @throws \Exception
     */
    public function destroy(ClassLevelCategory $unit)
    {
        $unit->delete();
    }
}

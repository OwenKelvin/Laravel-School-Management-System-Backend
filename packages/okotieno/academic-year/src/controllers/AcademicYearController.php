<?php

namespace Okotieno\AcademicYear\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\AcademicYear\Requests\CreateAcademicYearRequest;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AcademicYear::all());
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
     * @param CreateAcademicYearRequest $request
     * @return JsonResponse
     */
    public function store(CreateAcademicYearRequest $request)
    {
        return response()->json(AcademicYear::createAcademicYear($request));
    }

    /**
     * Display the specified resource.
     *
     * @param AcademicYear $academicYear
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicYear $academicYear, Request $request)
    {
        return response()->json($academicYear);
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
     * @param AcademicYear $academicYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicYear $academicYear)
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

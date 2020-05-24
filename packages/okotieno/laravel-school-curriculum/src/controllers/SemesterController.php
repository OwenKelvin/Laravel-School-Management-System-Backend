<?php

namespace Okotieno\SchoolCurriculum\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\SchoolCurriculum\Requests\CreateSemesterRequest;
use Okotieno\SchoolCurriculum\Models\Semester;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->active) {
            return Semester::where('active', true)->get();
        }
        return response()->json(Semester::all());
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateSemesterRequest $request)
    {
        return response()->json(Semester::createSemester($request));
    }

    /**
     * Display the specified resource.
     *
     * @param Semester $semester
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Semester $semester, Request $request)
    {
        return response()->json($semester);
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
     * @param \Illuminate\Http\Request $request
     * @param Semester $semester
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Semester $semester)
    {
        return response()->json(Semester::updateSemester($semester, $request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Semester $semester
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Semester $semester)
    {
        $semester->delete();
        return response()->json([
            'saved' => true,
            'message' => 'Successfully deleted semester'
        ]);
    }
}

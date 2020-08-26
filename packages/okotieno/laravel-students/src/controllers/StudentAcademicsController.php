<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 12/12/2019
 * Time: 11:28 AM
 */

namespace Okotieno\Students\Controllers;


use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;
use Okotieno\AcademicYear\Models\AcademicYearUnitAllocation;


class StudentAcademicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, User $user)
    {
        $response = [];

//        foreach ($user->student->unitAllocation as $unitAllocation) {
//
//            $response[] = [
//                'class_level' => [
//                    'id' => $unitAllocation->classLevel->id,
//                    'name' => $unitAllocation->classLevel->name,
//                ],
//                'unit_level' => [
//                    'id' => $unitAllocation->unitLevel->id,
//                    'name' => $unitAllocation->unitLevel->name,
//                ],
//                'academic_year' => [
//                    'id' => $unitAllocation->academicYear->id,
//                    'name' => $unitAllocation->academicYear->name
//                ],
//                'id' => $unitAllocation->id,
//
//            ];
//        }
        foreach ($user->student->unitAllocation->groupBy('academic_year_id') as $unitAllocation) {
            $classLevels = [];
            foreach( $unitAllocation->groupBy('class_level_id') as $classLevel) {
                $units = [];
                foreach ($classLevel as $item) {
                    $units[] = $item->unitLevel;
                }
                $classLevels[] = [
                    'class_level_id' => $classLevel[0]->classLevel->id,
                    'class_level_name' => $classLevel[0]->classLevel->name,
                    'units' =>$units
                ];
            }

            $response[] = [
                'academic_year_id' => $unitAllocation[0]->academicYear->id,
                'academic_year_name' => $unitAllocation[0]->academicYear->name,
                'class_levels' => $classLevels,
//                'raw' => $unitAllocation
            ];
        }
        return response()->json($response);
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
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, User $user)
    {

        foreach ($request->all() as $allocation) {

            $user
                ->student
                ->unitAllocation()
                ->save(AcademicYearUnitAllocation::find($allocation));
        }

        return response()->json([
            'saves' => true,
            'message' => 'Successfully allocated units to the student',
            'data' => $user->student->unitAllocation
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

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
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return void
     * @throws \Exception
     */
    public function destroy()
    {

    }
}

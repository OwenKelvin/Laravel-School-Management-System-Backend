<?php

namespace Okotieno\SchoolCurriculum\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Okotieno\SchoolCurriculum\Models\Unit;
use Okotieno\SchoolCurriculum\Models\UnitLevel;

class UnitLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->academic_year_id != null || $request->class_level_id != null) {
            $unitLevels = DB::table('unit_levels')
//                ->where('users.id', $user->id)
                ->leftJoin('academic_year_unit_allocations', function ($join) {
                    $join->on('academic_year_unit_allocations.unit_level_id', '=', 'unit_levels.id');
                });

            if ($request->academic_year_id != null) {
                $unitLevels = $unitLevels->where(
                    'academic_year_unit_allocations.academic_year_id',
                    $request->academic_year_id
                );
            }
            if ($request->class_level_id != null) {
                $unitLevels = $unitLevels->where(
                    'academic_year_unit_allocations.class_level_id',
                    $request->class_level_id
                );
            }

            return response()->json(
                $unitLevels
                    ->select(['name as unit_level_name','academic_year_id', 'class_level_id', 'unit_level_id'])
                    ->distinct()->get()
            );
        }

        $unitLevels = [];
        if ($request->unit) {
            return Unit::find($request->unit)->unitLevels->map(function ($itemInner) {
                // return $itemInner;
                return [
                    'id' => $itemInner->id,
                    'name' => $itemInner->name
                ];
            });
        }

        foreach (Unit::all() as $item) {
            // return $item;
            $items = $item->unitLevels->map(function ($itemInner) use ($item) {
                // return $itemInner;
                return [
                    'id' => $itemInner->id,
                    'name' => $itemInner->name
                ];
            });
            $unitLevels = array_merge($unitLevels, $items->toArray());
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     * @param int $id
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
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(UnitLevel $unitLevel)
    {
        $unitLevel->delete();
        return response()->json([
            'saved' => true,
            'message' => 'Unit Level Successfully deleted'
        ]);
    }
}

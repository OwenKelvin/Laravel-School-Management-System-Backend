<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 1/26/2020
 * Time: 6:56 PM
 */

namespace Okotieno\AcademicYear\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\SchoolCurriculum\UnitLevel;


class AcademicYearUnitLevelController extends Controller
{
    public function index(Request $request, AcademicYear $academicYear)
    {
        $response = [];
        if ($request->class_level) {
            $allocations = $academicYear
                ->classAllocations
                ->where('class_level_id',$request->class_level);
            foreach ($allocations as $allocation) {
                $response[] = [
                    'id' => $allocation['id'],
                    'name' => UnitLevel::find($allocation['unit_level_id'])->name
                ];
            }

            return response()->json($response);
        }
    }

    public function store(Request $request, AcademicYear $academicYear)
    {
        $academicYear->classAllocations()->delete();
        foreach ($request->all() as $item) {

            foreach ($item['unitLevels'] as $item1) {
                $academicYear->classAllocations()->create([
                    'class_level_id' => $item['id'],
                    'unit_level_id' => $item1
                ]);
            }
        }
        return response()->json([
            'saved' => true,
            'message' => 'Successfully saved Unit Levels Allocations',
            'data' => $academicYear->classAllocations
        ]);
    }
}

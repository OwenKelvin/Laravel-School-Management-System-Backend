<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 2/10/2020
 * Time: 10:29 PM
 */

namespace Okotieno\SchoolAccounts\Controllers;


use App\Http\Controllers\Controller;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\SchoolAccounts\Requests\StoreFinancialPlanRequest;
use Okotieno\SchoolCurriculum\Models\ClassLevel;
use Okotieno\SchoolCurriculum\Models\Semester;

class FinancialPlanController extends Controller
{
    public function index(AcademicYear $academicYear)
    {
        $tuitionPlans = [];
        foreach ($academicYear->tuitionFeeFinancialPlans->groupBy('class_level_id') as $classLevelId => $tuitionPlan){
            $unitLevels = [];
            foreach ($tuitionPlan->groupBy('unit_level_id') as $key => $value){
                $semesters = [];
                foreach ($value as $semester) {
                    $semesters[] = [
                        'id' => $semester['semester_id'],
                        'name' => Semester::find($semester['semester_id'])->name,
                        'amount' => $semester['amount']
                    ];
                }
                $unitLevels[] = [
                    'id' => $key,
                    'semesters' => $semesters
                ];
            }

            $tuitionPlans[] = [
                'classLevelId' => $classLevelId,
                'name' => ClassLevel::find($classLevelId)->name,
                'unitLevels' => $unitLevels
            ];
        }

        return ['tuitionFee' => $tuitionPlans];
    }

    public function store(StoreFinancialPlanRequest $request, AcademicYear $academicYear)
    {
        $tuitionFees = $request->tuitionFee;

        foreach ($tuitionFees as $tuitionFee) {
            $classLevelId = $tuitionFee['classLevelId'];
            $unitLevels = $tuitionFee['unitLevels'];

            foreach ($unitLevels as $unitLevel) {
                $unitLevelId = $unitLevel['id'];
                $semesters = $unitLevel['semesters'];
                foreach ($semesters as $semester) {
                    $academicYear->tuitionFeeFinancialPlans()
                        ->updateOrCreate(
                            [
                                'semester_id' => $semester['id'],
                                'class_level_id' => $classLevelId,
                                'unit_level_id' => $unitLevelId
                            ],
                            [
                                'amount' => $semester['amount']
                            ]
                        );
                }
            }
        }

        return [
            'saved' => true,
            'message' => 'Financial Plan Successfully saved',
            'data' => $academicYear->tuitionFeeFinancialPlans
        ];
    }
}

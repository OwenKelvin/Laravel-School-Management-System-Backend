<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 2/10/2020
 * Time: 10:29 PM
 */

namespace Okotieno\SchoolAccounts\Controllers;


use App\Http\Controllers\Controller;
use function foo\func;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\SchoolAccounts\Models\FinancialCost;
use Okotieno\SchoolAccounts\Models\OtherFeesFinancialPlan;
use Okotieno\SchoolAccounts\Requests\StoreFinancialPlanRequest;
use Okotieno\SchoolCurriculum\Models\ClassLevel;
use Okotieno\SchoolCurriculum\Models\Semester;
use Okotieno\SchoolCurriculum\UnitLevel;

class FinancialPlanController extends Controller
{
    public function index(AcademicYear $academicYear)
    {
        $tuitionPlans = [];
        foreach ($academicYear->tuitionFeeFinancialPlans->groupBy('class_level_id') as $classLevelId => $tuitionPlan) {
            $unitLevels = [];
            foreach ($tuitionPlan->groupBy('unit_level_id') as $key => $value) {
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
        $otherFeesPlans = [];
        foreach ($academicYear->classAllocations->groupBy('class_level_id') as $classLevelId => $classLevel) {
            $semestersIds = ClassLevel::find($classLevelId)
                ->unitLevels->map(function ($unitLevel) {
                return $unitLevel->semesters;
            })
                ->flatten()->pluck('pivot')
                ->flatten()->pluck('semester_id')->unique();

            $financialCosts = [];
            $semesters = Semester::find($semestersIds);
            foreach (FinancialCost::all() as $financialCost) {
                $costItems = [];
                foreach ($financialCost->costItems as $costItem){
                    $semestersTemp = [];
                    foreach ($semesters as $semester){
                        $amount = $academicYear->otherFeesFinancialPlan()->where([
                            'semester_id' => $semester['id'],
                            'class_level_id' => $classLevelId,
                            'financial_cost_item_id' => $costItem['id']])->first();
                        $amount = $amount == null ? 0 : $amount['amount'];

                        $semestersTemp[] = [
                            'id' => $semester->id,
                            'name' => $semester->name,
                            'amount' => $amount
                        ];
                    }

                    $costItems[] = [
                        'id' => $costItem->id,
                        'name'=> $costItem->name,
                        'semesters' => $semestersTemp
                    ];
                }
                $financialCosts[] = [
                    'id' => $financialCost->id,
                    'name' => $financialCost->name,
                    'costItems' => $costItems
                ];
            }

            $otherFeesPlans[] = [
                'classLevelId' => $classLevelId,
                'name' => ClassLevel::find($classLevelId)->name,
                'financialCosts' => $financialCosts
            ];
        }

        return [
            'tuitionFee' => $tuitionPlans,
            'otherFees' => $otherFeesPlans,
        ];
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

        $academicYear->saveOtherFeePayments($request->otherFees);
        return [
            'saved' => true,
            'message' => 'Financial Plan Successfully saved',
            'data' => $academicYear->tuitionFeeFinancialPlans
        ];
    }
}

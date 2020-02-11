<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 2/10/2020
 * Time: 10:29 PM
 */

namespace Okotieno\SchoolAccounts\Controllers;


use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\SchoolAccounts\Requests\StoreFinancialPlanRequest;

class FinancialPlanController
{
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

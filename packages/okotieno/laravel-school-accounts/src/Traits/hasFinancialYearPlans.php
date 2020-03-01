<?php

namespace Okotieno\SchoolAccounts\Traits;

use Illuminate\Http\Request;
use Okotieno\SchoolAccounts\Models\TuitionFeeFinancialPlan;
use Okotieno\SchoolAccounts\Models\OtherFeesFinancialPlan;

trait hasFinancialYearPlans
{
    public function tuitionFeeFinancialPlans()
    {
        return $this->hasMany(TuitionFeeFinancialPlan::class);
    }

    public function saveOtherFeePayments($feeCosts) {
        $flattenedCost = [];
        foreach ($feeCosts as $otherFeeCost) {
            $classLevelId = $otherFeeCost['classLevelId'];
            foreach ($otherFeeCost['financialCosts'] as $financialCost) {
                foreach ($financialCost['costItems'] as $costItem) {
                    $costItemId = $costItem['id'];
                    foreach ($costItem['semesters'] as $semester){
                        $flattenedCost[] = [
                            'amount' => $semester['amount'],
                            'semester_id' => $semester['id'],
                            'class_level_id' => $classLevelId,
                            'financial_cost_item_id' => $costItemId,
                            'academic_year_id' => $this['id']
                        ];
                        $this->otherFeesFinancialPlan()->updateOrCreate([
                            'semester_id' => $semester['id'],
                            'class_level_id' => $classLevelId,
                            'financial_cost_item_id' => $costItemId,
                        ], ['amount' => $semester['amount']]);
                    }
                }

            }

        }
        // $this->otherFeesFinancialPlan()->insert($flattenedCost);
        return $flattenedCost;
    }
    public function otherFeesFinancialPlan()
    {
        return $this->hasMany(OtherFeesFinancialPlan::class);
    }
}

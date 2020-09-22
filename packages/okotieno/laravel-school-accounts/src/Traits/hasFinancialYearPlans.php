<?php

namespace Okotieno\SchoolAccounts\Traits;

use Okotieno\SchoolAccounts\Models\TuitionFeeFinancialPlan;
use Okotieno\SchoolAccounts\Models\OtherFeesFinancialPlan;
use Okotieno\SchoolCurriculum\Models\Semester;

trait hasFinancialYearPlans
{
  public function tuitionFeeFinancialPlans()
  {
    return $this->hasMany(TuitionFeeFinancialPlan::class);
  }

  public function getSemestersAttribute() {
    return $this->semesters();
  }

  public function semesters()
  {
    return Semester::find(
      $this->tuitionFeeFinancialPlans()
        ->select('semester_id')->distinct()
        ->get()
        ->pluck(['semester_id'])
        ->toArray()
    );
  }

  public function saveOtherFeePayments($feeCosts)
  {
    $flattenedCost = [];
    foreach ($feeCosts as $otherFeeCost) {
      $classLevelId = $otherFeeCost['classLevelId'];
      foreach ($otherFeeCost['financialCosts'] as $financialCost) {
        foreach ($financialCost['costItems'] as $costItem) {
          $costItemId = $costItem['id'];
          foreach ($costItem['semesters'] as $semester) {
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

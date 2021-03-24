<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 2/10/2020
 * Time: 10:29 PM
 */

namespace Okotieno\SchoolAccounts\Controllers;


use App\Http\Controllers\Controller;
use Okotieno\SchoolCurriculum\Models\UnitLevel;
use function foo\func;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\SchoolAccounts\Models\FinancialCost;
use Okotieno\SchoolAccounts\Requests\StoreFinancialPlanRequest;
use Okotieno\SchoolCurriculum\Models\ClassLevel;
use Okotieno\SchoolCurriculum\Models\Semester;

class FinancialPlanController extends Controller
{
  public function index(AcademicYear $academicYear)
  {
    $allSemesters = Semester::select('id')->get()->pluck('id');
    $tuitionPlans = [];
    $semTotal = [];
    foreach ($academicYear->tuitionFeeFinancialPlans->groupBy('class_level_id') as $classLevelId => $tuitionPlan) {
      $unitLevels = [];

      foreach ($allSemesters as $sem) {
        $semTotal[$sem] = 0;
      }
      foreach ($tuitionPlan->groupBy('unit_level_id') as $key => $value) {
        $semesters = [];
        $total = 0;
        foreach ($value as $semester) {
          $total += $semester['amount'];
          $semTotal[$semester['semester_id']] += $semester['amount'];
          $semesters[] = [
            'id' => $semester['semester_id'],
            'name' => Semester::find($semester['semester_id'])->name,
            'amount' => $semester['amount']
          ];
        }
        $unitLevels[] = [
          'id' => $key,
          'semesters' => $semesters,
          'total' => $total,
          'unitName' => UnitLevel::find($key)->name,
        ];
      }

      $tuitionPlans[] = [
        'classLevelId' => $classLevelId,
        'name' => ClassLevel::find($classLevelId)->name,
        'unitLevels' => $unitLevels,
        'semTotals' => $semTotal,
        'total'=>array_sum($semTotal)
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

      foreach ($allSemesters as $sem) {
        $semTotal[$sem] = 0;
      }
      $financialCosts = [];
      $semesters = Semester::find($semestersIds);
      foreach (FinancialCost::all() as $financialCost) {
        $costItems = [];
        foreach ($financialCost->costItems as $costItem) {
          $semestersTemp = [];
          $total = 0;
          foreach ($semesters as $semester) {
            $amount = $academicYear->otherFeesFinancialPlan()->where([
              'semester_id' => $semester['id'],
              'class_level_id' => $classLevelId,
              'financial_cost_item_id' => $costItem['id']])->first();
            $amount = $amount == null ? 0 : $amount['amount'];
            $total += $amount;
            $semTotal[$semester['id']] += $amount;
            $semestersTemp[] = [
              'id' => $semester->id,
              'name' => $semester->name,
              'amount' => $amount
            ];
          }

          $costItems[] = [
            'id' => $costItem->id,
            'name' => $costItem->name,
            'semesters' => $semestersTemp,
            'total' => $total
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
        'financialCosts' => $financialCosts,
        'semTotals' => $semTotal,
        'total'=>array_sum($semTotal)
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

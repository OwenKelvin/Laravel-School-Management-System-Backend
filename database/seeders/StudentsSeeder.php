<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\AcademicYear\Models\AcademicYearUnitAllocation;
use Okotieno\SchoolCurriculum\Models\ClassLevel;
use Okotieno\StudentAdmissions\Models\Student;

class StudentsSeeder extends Seeder
{
  /**
   * Run the database seeders.
   *
   * @return void
   */
  public function run()
  {
    $users = User::factory()->count(40)->create();
    foreach ($users as $user) {
      User::find($user->id)->makeStudent();
    }

    $classLevels = ClassLevel::all();
    $academicYears = AcademicYear::all();


    $students = Student::all();
    foreach ($students as $key => $student) {
      echo ($key + 1) . " of " . $students->count() . "\r";
      $maxAcademicYear = $academicYears->count();
      $maxClassLevel = $classLevels->count();
      $activeYears = rand(1, 2);
      $academicYear = array_rand($academicYears->toArray());
      $classLevel = array_rand($classLevels->toArray());
      for ($i = 0; $i < $activeYears; $i++) {
        if (($academicYear + $i) < $maxAcademicYear && $maxClassLevel > ($classLevel + $i)) {

          $academicYearId = $academicYears[$academicYear]->id;
          $classLevelId = $classLevels[$classLevel]->id;
          $allocations = AcademicYearUnitAllocation::where([
            'academic_year_id' => $academicYearId + $i,
            'class_level_id' => $classLevelId + $i
          ])->get();
          foreach ($allocations as $allocation) {
            $student->unitAllocation()->save($allocation);
          }
        }
      }
    }
  }
}

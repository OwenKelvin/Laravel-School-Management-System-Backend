<?php

use Illuminate\Database\Seeder;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\AcademicYear\Models\AcademicYearUnitAllocation;
use Okotieno\SchoolCurriculum\Models\ClassLevel;
use Okotieno\SchoolCurriculum\Models\UnitLevel;

class AcademicYearsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcademicYear::insert([
            ['name' => '2020', 'start_date' => '2020-01-01', 'end_date' => '2020-12-31'],
            ['name' => '2019', 'start_date' => '2019-01-01', 'end_date' => '2019-12-31'],
            ['name' => '2018', 'start_date' => '2018-01-01', 'end_date' => '2018-12-31'],
            ['name' => '2017', 'start_date' => '2017-01-01', 'end_date' => '2017-12-31'],
        ]);
        foreach (AcademicYear::all() as $academicYear) {
           foreach (ClassLevel::all() as $classLevel){
               foreach (UnitLevel::where('level', $classLevel->id)->get() as $unitLevel){
                   AcademicYearUnitAllocation::allocate(
                       $academicYear->id, $classLevel->id, $unitLevel->id
                   );
               }
           }
        }
    }
}

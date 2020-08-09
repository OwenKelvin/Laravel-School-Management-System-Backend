<?php

use Illuminate\Database\Seeder;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\Okotieno\SchoolCurriculum\Models\ClassLevel::all() as $classLevel) {

        }
    }
}

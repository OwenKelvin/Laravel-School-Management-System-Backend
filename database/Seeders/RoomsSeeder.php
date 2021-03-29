<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database Seeders.
     *
     * @return void
     */
    public function run()
    {
        foreach (\Okotieno\SchoolCurriculum\Models\ClassLevel::all() as $classLevel) {
            foreach (\Okotieno\SchoolCurriculum\Models\Stream::all() as $stream) {
                \Okotieno\SchoolInfrastructure\Models\Room::create([
                    'name' => $classLevel->abbreviation. ' '.$stream->abbreviation. ' Room',
                    'abbreviation' => $classLevel->abbreviation. ' '.$stream->abbreviation. ' Room',
                    'width' => '7',
                    'length' => '8',
                    'students_capacity' => '50'
                ]);
            }
        }
    }
}

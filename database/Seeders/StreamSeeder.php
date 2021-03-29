<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StreamSeeder extends Seeder
{
    /**
     * Run the database Seeders.
     *
     * @return void
     */
    public function run()
    {
        $streams = [
            ['name' => 'North', 'abbreviation' =>'N', 'active'=>true, 'associated_color' => 'red'],
            ['name' => 'South', 'abbreviation' =>'S', 'active'=>true, 'associated_color' => 'blue'],
        ];
        foreach ($streams as $stream) {
            \Okotieno\SchoolCurriculum\Models\Stream::create($stream);
        }
    }
}

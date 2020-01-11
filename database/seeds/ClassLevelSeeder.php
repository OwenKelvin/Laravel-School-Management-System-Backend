<?php

use Illuminate\Database\Seeder;

class ClassLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classLevelCategories = [
            [
                'active' => true,
                'name' => 'Pre Primary',
                'class_levels' => [
                    [
                        'name' => 'Pre Primary 1',
                        'abbreviation' => 'PP1',
                        'active' => true,
                    ],
                    [
                        'name' => 'Pre Primary 2',
                        'abbreviation' => 'PP2',
                        'active' => true,
                    ]
                ]
            ],
            ['active' => false, 'name' => 'Lower Primary'],
            ['active' => false, 'name' => 'Upper Primary'],
        ];
        foreach ($classLevelCategories as $classLevelCategory) {
            $clc = \Okotieno\SchoolCurriculum\Models\ClassLevelCategory::create([
                'name' => $classLevelCategory['name'],
                'active' => $classLevelCategory['active'],
            ]);
            if (key_exists('class_levels', $classLevelCategory)) {
                foreach ($classLevelCategory['class_levels'] as $class_level) {
                    $clc->classLevels()->create([
                        'name' => $class_level['name'],
                        'active' => $class_level['active'],
                        'abbreviation'  => $class_level['abbreviation' ],
                    ]);
                }
            }
        }
    }
}

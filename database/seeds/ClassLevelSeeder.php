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
                'description' => '<p>The Pre-primary curriculum design has been developed to embrace the competence based learning approach as stipulated in the basic education curriculum frame-work (BECF). The curriculum design is available in two volumes which cater for children at the pre-primary level in the country. It has been divided into two levels: Level I (pre-primary 1) for children aged four years and Level II (pre-primary 2) for children aged five years. The curriculum covers the following learning areas: <i>Language</i>, <i>Mathematical</i>, <i>Environmental</i>, <i>Psychomotor and Creative</i> and <i>Religious Education</i> activity areas.</p>
<p>Each learning activity area has both the general and specific learning outcomes clearly stipulated. The learning experiences and the key inquiry questions have also been provided specifically to give guidance to the users during the curriculum delivery process.</p>',
                'class_levels' => [
                    [
                        'name' => 'Pre Primary 1',
                        'abbreviation' => 'PP1',
                        'active' => true,
                        'description' => '<p>Level I of the Pre Primary</p>'
                    ],
                    [
                        'name' => 'Pre Primary 2',
                        'abbreviation' => 'PP2',
                        'active' => true,
                        'description' => '<p>Level <I></I>I of the Pre Primary</p>'
                    ]
                ]
            ],
            [
                'active' => false, 'name' => 'Lower Primary',
                'description' => '<p>The Lower Primary designs are meant for learners in Grade 1 to 3. They have taken cognisance of the various aspects of development of learners of that age cohort. The designs are comprehensive enough to guide the teachers to effectively deliver the curriculum.</p>'
            ],
            ['active' => false, 'name' => 'Upper Primary', 'description' => ''],
        ];
        foreach ($classLevelCategories as $classLevelCategory) {
            $clc = \Okotieno\SchoolCurriculum\Models\ClassLevelCategory::create([
                'name' => $classLevelCategory['name'],
                'active' => $classLevelCategory['active'],
                'description' => $classLevelCategory['description'],
            ]);
            if (key_exists('class_levels', $classLevelCategory)) {
                foreach ($classLevelCategory['class_levels'] as $class_level) {
                    $clc->classLevels()->create([
                        'name' => $class_level['name'],
                        'active' => $class_level['active'],
                        'abbreviation' => $class_level['abbreviation'],
                        'description' => $class_level['description'],
                    ]);
                }
            }
        }
    }
}

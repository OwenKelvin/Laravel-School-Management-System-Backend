<?php

use Illuminate\Database\Seeder;
use Okotieno\SchoolCurriculum\Models\Semester;
use Okotieno\SchoolCurriculum\Models\UnitCategory;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unitCategories = [
            [
                'id' => 1, 'name' => 'Language Activities',
                'active' => true,
                'description' => '<p>Language is a medium of communication. At the pre-primary level, children will be involved in activities that enhance the ability to become active listeners and speakers in diverse situations as well as express their feelings, ideas and opinions clearly and with confidence. In addition, learners will be involved in reading readiness and writing readiness activities in order to lay a good foundation for formal reading and writing instruction in grade one.</p>',
                'units' => [
                    [
                        'active' => true,
                        'default' => true,
                        'abbreviation' => 'LA',
                        'name' => 'Language Activities',
                        'description' => '',
                        'levels' => [
                            ['name' => 'LA PP1', 'level' => 1, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
                            ['name' => 'LA PP2', 'level' => 2, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
                        ]
                    ]
                ]

            ],
            [
                'id' => 2, 'name' => 'Mathematical Activities',
                'active' => true,
                'description' => '<p>Mathematical activities at the pre-primary level empower children to engage in basic analysis of problems and to develop appropriate solutions in day to day life. These activities help to develop mental processes that enhance logical and critical thinking, accuracy and problem solving; all of which are important building blocks for primary school readiness. They also enhance the learner’s development and acquisition of basic classification, number and measurement skills during early years.</p>',
                'units' => [
                    [
                        'active' => true,
                        'default' => true,
                        'abbreviation' => 'MA',
                        'name' => 'Mathematical Activities',
                        'description' => '',
                        'levels' => [
                            ['name' => 'MA PP1', 'level' => 1, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
                            ['name' => 'MA PP2', 'level' => 2, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
                        ]
                    ]
                ]
            ],
            [
                'id' => 3, 'name' => 'Environmental Activities',
                'active' => true,
                'description' => '<p>Environmental activity area in pre-primary entails the study of the relationship between man and his environment. It comprises; the local natural environment and its care, social relationships, health practices and safety. This provides opportunities for the learner to explore, experiment and interact with the immediate environment. This enables the learner to acquire skills to; enjoy learning, promote good health, safety, environmental conservation and appreciate rich cultural diversity.</p>',
                'units' => [
                    [
                        'active' => true,
                        'default' => true,
                        'abbreviation' => 'EA',
                        'name' => 'Environmental Activities',
                        'description' => '',
                        'levels' => [
                            ['name' => 'EA PP1', 'level' => 1, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
                            ['name' => 'EA PP2', 'level' => 2, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
                        ]
                    ]
                ]
            ],
            [
                'id' => 4, 'name' => 'Psychomotor and Creative Activities',
                'active' => true,
                'description' => '<p>Enable learners to develop both fine and gross motor skills which are necessary for the control and co-ordination of the different parts of the body. These activities enhance exploration and development of personal talents as well as appreciation of cultural heritage.</p>',
                'units' => [
                    [
                        'active' => true,
                        'default' => true,
                        'abbreviation' => 'P&C A',
                        'name' => 'Psychomotor and Creative Activities',
                        'description' => '',
                        'levels' => [
                            ['name' => 'P&C PP1', 'level' => 1, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
                            ['name' => 'P&C PP2', 'level' => 2, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
                        ]
                    ]
                ]
            ],
            [
                'id' => 5, 'name' => 'Religious Education Activities',
                'active' => true,
                'description' => '',
                'units' => [
                    [
                        'active' => true,
                        'default' => true,
                        'abbreviation' => 'CRE',
                        'name' => 'Christian Religious Education',
                        'description' => '<p><p>Christian Religious Education (CRE) activities at the pre-primary level focus on the holistic development of the learner through use of life approach. The activity help the learner to differentiate between good and evil, learn about God, His beautiful creation (living and non-living things) and prayer. These activities are geared towards the continuous moral and spiritual development of the learner. Teachers should help the learner to appreciate people of different religious backgrounds, through emphasis on love and respect for one another.</p>
<p>The aim of Christian Religious Education activities at the pre-school level, is to develop awareness and appreciation of the generosity, love and care of God. This will enable the learner to acquire the qualities of sharing, respect, kindness, getting along with others and the ability to differentiate good from evil.</p>
<p>Christian Religious Education is a unique subject in the curriculum because it touches on core aspects of the society. Christian Religious Education is concerned with both the academic and moral development of the individual learner. The teaching of CRE therefore, cannot be separated from the daily life situations which affect the physical, moral, emotional and spiritual growth of the learner. In the present society, the learner is faced with various challenges in life. The CRE Curriculum aims at equipping the learner with spiritual, intellectual and moral development to be able to deal with these challenges.</p></p>',
                        'levels' => [
        ['name' => 'CRE PP1', 'level' => 1, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
        ['name' => 'CRE PP2', 'level' => 2, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
    ]
                    ],
                    [
                        'active' => true,
                        'abbreviation' => 'IRE',
                        'default' => false,
                        'name' => 'Islamic Religious Education',
                        'description' => '<p>Religious activities at the pre-primary level comprise learning about the supernatural being (Allah S.W.T.). The aim of Islamic religious education activities at the pre-primary level is to develop awareness and appreciation of the generosity, love and care of Allah (S.W.T.) to all His creation. This will enable children acquire the values of sharing, care, respect, love, empathy, obedience, kindness, being social, helping those in need and the ability to tell right from wrong. These activities are geared towards the continuous moral and spiritual development of young children. Children need to participate in activities that integrate religion and moral values. Teachers should help them appreciate people of different religious backgrounds and inculcate these values at an early age so that they can grow up as upright members of the society.</p>',
                        'levels' => [
                            ['name' => 'IRE PP1', 'level' => 1, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
                            ['name' => 'IRE PP2', 'level' => 2, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
                        ]

                    ],
                    [
                        'active' => true,
                        'default' => false,
                        'abbreviation' => 'HRE',
                        'name' => 'Hindu Religious Education',
                        'description' => '<p><p>Hindu Religious Education (HRE) offers an opportunity to learn the Hindu religion and its aspects. Hindu Religion is a way of life and its teaching starts in early childhood.
<p>HRE in the schools is a continuation of the knowledge acquired at home in early childhood. HRE is an integration of four faiths: Hinduism, Sikhism, Buddhism and Jainism.</p>
<p>The teaching of HRE in PP1 level aims at nurturing faith in Paramatma and recognising self-awareness and understanding social obligations and responsibility to the immediate environment. HRE thus, enables learners to enjoy learning and living through play. It provides an opportunity to instil in children good social habits and moral values for effective living as righteous individuals and useful members of the community, Nation and as responsible global citizens. The HRE curriculum, therefore, provides avenues for holistic physical mental, emotional and spiritual growth for learners. It enables them to develop personal beliefs while appreciating the beliefs of others. HRE also covers pertinent and contemporary issues in society such as children’s rights, life skills and community service.</p>
The learners acquire requisite competencies such as Communication and Collaboration, Imagination and Creativity, Digital Literacy, Critical Thinking and Problem solving, Learning to Learn and Self-efficacy.</p></p>',
                        'levels' => [
                            ['name' => 'HRE PP1', 'level' => 1, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
                            ['name' => 'HRE PP2', 'level' => 2, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
                        ]
                    ]
                ]
            ],
            [
                'id' => 6, 'name' => 'Pastoral Programmes of Instruction (PPI)',
                'active' => true,
                'description' => '',
                'units' => [
                    [
                        'active' => true,
                        'default' => true,
                        'abbreviation' => 'PPI',
                        'name' => 'Pastoral Programmes of Instruction',
                        'description' => '',
                        'levels' => [
                            ['name' => 'PPI PP1', 'level' => 1, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
                            ['name' => 'PPI PP2', 'level' => 2, 'semesters' => ['Term 1', 'Term 2', 'Term 3']],
                        ]
                    ]
                ]
            ],
        ];

        foreach ($unitCategories as $unitCategory) {

            $categoryCreated = UnitCategory::create([
                'name' => $unitCategory['name'],
                'active' => $unitCategory['active'],
                'description' => $unitCategory['description'],
            ]);

            foreach ($unitCategory['units'] as $unit) {
                $unitCreated = $categoryCreated->units()->create([
                    'active' => $unit['active'],
                    'default' => $unit['default'],
                    'abbreviation' => $unit['abbreviation'],
                    'name' => $unit['name'],
                    'description' => $unit['description']
                ]);

                foreach ($unit['levels'] as $unitLevel) {
                    $unitLevelSaved = $unitCreated->unitLevels()->create([
                        'name' => $unitLevel['name'],
                        'level' => $unitLevel['level'],
                    ]);

                    $semesters = $unitLevel['semesters'];
                    foreach ($semesters as $semester) {
                        $unitLevelSaved->semesters()->save(Semester::where('name', $semester)->first());
                    }
                }
            }

        }

    }
}

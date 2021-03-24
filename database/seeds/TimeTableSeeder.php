<?php

use Illuminate\Database\Seeder;
use Okotieno\TimeTable\Models\TimeTableTimingTemplate;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timetables = [
            [
                'description' => '1hr Per Lesson, 30Min TeaBreak, 1Hr 30Min Lunch Break',
                'timings' => [
                    ['start' => '08:00:00', 'end' => '09:00:00'],
                    ['start' => '09:00:00', 'end' => '10:00:00'],
                    ['start' => '10:00:00', 'end' => '11:00:00'],
                    ['start' => '11:30:00', 'end' => '12:30:00'],
                    ['start' => '14:00:00', 'end' => '15:00:00'],
                    ['start' => '15:00:00', 'end' => '16:00:00']
                ]
            ],
            [
                'description' => '40 Min Per Lesson, 20Min Short Break, 30Min Short Break, 1Hr 30Min Lunch Break',
                'timings' => [
                    ['start' => '08:00:00', 'end' => '08:40:00'],
                    ['start' => '08:40:00', 'end' => '09:20:00'],
                    ['start' => '09:40:00', 'end' => '10:20:00'],
                    ['start' => '10:20:00', 'end' => '11:20:00'],
                    ['start' => '11:50:00', 'end' => '12:30:00'],
                    ['start' => '14:00:00', 'end' => '14:40:00'],
                    ['start' => '14:40:00', 'end' => '15:20:00'],
                    ['start' => '15:20:00', 'end' => '16:00:00']
                ]
            ]
        ];
        foreach ($timetables as $timetable) {
            $template = TimeTableTimingTemplate::create(['description' => $timetable['description']]);

            foreach ($timetable['timings'] as $timing) {
                $template->timings()->create($timing);
            }

        }

    }
}

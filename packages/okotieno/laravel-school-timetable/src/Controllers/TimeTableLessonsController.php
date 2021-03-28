<?php


namespace Okotieno\TimeTable\Controllers;

use App\Http\Controllers\Controller;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\SchoolCurriculum\Models\ClassLevel;
use Okotieno\SchoolStreams\Models\Stream;
use Okotieno\TimeTable\Models\TimeTable;
use Okotieno\TimeTable\Models\TimeTableLesson;
use Illuminate\Http\Request;
use Okotieno\TimeTable\Models\TimeTableTiming;
use Okotieno\TimeTable\Models\WeekDay;

class TimeTableLessonsController extends Controller
{
    public function index(AcademicYear $academicYear, TimeTable $timeTable)
    {
        return response()->json($timeTable->lessons);
    }

    public function store(AcademicYear $academicYear, TimeTable $timeTable, Request $request)
    {
        foreach ($request->all() as $lesson) {
            if (key_exists('timeValue', $lesson)) {
                $timings = explode(' - ', $lesson['timeValue']);
                $timing = TimeTableTiming::where(['start' => $timings[0], 'end' => $timings[1]])->first();
            } else {
                $timing = TimeTableTiming::find($lesson['timeId']);
            }

            if(key_exists('classLevelName', $lesson)) {
                $classLevel = ClassLevel::where(['abbreviation' => $lesson['classLevelName']])->first();
            } else {
                $classLevel = ClassLevel::find($lesson['classLevelId']);
            }
            if(key_exists('dayOfWeekName', $lesson)) {
                $dayOfWeek = WeekDay::where(['abbreviation' => $lesson['dayOfWeekName']])->first();
            } else {
                $dayOfWeek = WeekDay::find($lesson['dayOfWeekId'])->first();
            }
            if(key_exists('streamName', $lesson)) {
                $stream = Stream::where(['abbreviation' => $lesson['streamName']])->first();
            } else {
                $stream = Stream::find($lesson['streamId'])->first();
            }



            $lessonExists = TimeTableLesson::where([
                'class_level_id' => $classLevel->id,
                'time_table_id' => $timeTable->id,
                'week_day_id' => $dayOfWeek->id,
                'stream_id' => $stream->id,
                'time_table_timing_id' => $timing->id
            ])->first();

            if ($lessonExists == null) {
                TimeTableLesson::create([
                    'class_level_id' => $classLevel->id,
                    'teacher_id' => $lesson['teacherId'],
                    'time_table_id' => $timeTable->id,
                    'week_day_id' => $dayOfWeek->id,
                    'room_id' => $lesson['roomId'],
                    'unit_id' => $lesson['subjectId'],
                    'stream_id' => $stream->id,
                    'time_table_timing_id' => $timing->id
                ]);
            } else {
                $lessonExists->update([
                    'teacher_id' => $lesson['teacherId'],
                    'room_id' => $lesson['roomId'],
                    'unit_id' => $lesson['subjectId']
                ]);
            }

        }
        return response()->json([
            'saved' => true,
            'message' => 'Timetable successfully saved'
        ]);
    }

}

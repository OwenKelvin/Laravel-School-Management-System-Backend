<?php

namespace Okotieno\TimeTable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeTableLesson extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'teacher_id',
        'time_table_id',
        'week_day_id',
        'room_id',
        'unit_id',
        'stream_id',
        'time_table_timing_id',
        'class_level_id'
    ];
}

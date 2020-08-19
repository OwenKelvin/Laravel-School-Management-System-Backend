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
        'day_of_week_id',
        'room_id'
    ];
}

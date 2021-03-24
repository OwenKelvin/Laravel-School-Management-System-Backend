<?php

namespace Okotieno\TimeTable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeTable extends Model
{
    use SoftDeletes;
    protected $fillable = ['time_table_timing_template_id', 'description', 'academic_year_id'];

    public function timing() {
        return $this->belongsTo(TimeTableTimingTemplate::class);
    }

    public function lessons(){
        return $this->HasMany(TimeTableLesson::class);
    }
}

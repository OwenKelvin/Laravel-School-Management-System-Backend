<?php

namespace Okotieno\TimeTable\Models;

use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    protected $fillable = ['time_table_timing_id', 'description', 'academic_year_id'];
}

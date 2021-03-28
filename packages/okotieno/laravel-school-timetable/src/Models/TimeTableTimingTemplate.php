<?php

namespace Okotieno\TimeTable\Models;

use Illuminate\Database\Eloquent\Model;

class TimeTableTimingTemplate extends Model
{
    protected $fillable = ['description'];
    public function timings() {
        return $this->belongsToMany(TimeTableTiming::class);
    }
}

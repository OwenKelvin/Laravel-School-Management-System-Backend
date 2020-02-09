<?php

namespace Okotieno\SchoolCurriculum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Okotieno\SchoolCurriculum\Models\Semester;

class UnitLevel extends Model
{
    use softDeletes;
    protected $fillable = ['name', 'level'];
    public $timestamps = false;
    protected $hidden = ['deleted_at'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function semesters() {
        return $this->belongsToMany(Semester::class);
    }

}

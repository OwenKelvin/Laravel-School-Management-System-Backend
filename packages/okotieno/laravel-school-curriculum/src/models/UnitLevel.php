<?php

namespace Okotieno\SchoolCurriculum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitLevel extends Model
{
    use softDeletes;
    protected $fillable = ['name'];
    public $timestamps = false;
    protected $hidden = ['deleted_at'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}

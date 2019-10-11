<?php

namespace Okotieno\SchoolCurriculum;

use Illuminate\Database\Eloquent\Model;

class UnitCategory extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'active'];
}

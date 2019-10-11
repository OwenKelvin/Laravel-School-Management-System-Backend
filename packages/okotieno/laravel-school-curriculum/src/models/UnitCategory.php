<?php

namespace Okotieno\SchoolCurriculum;

use App\Traits\canBeActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitCategory extends Model
{
    use canBeActive,softDeletes;
    public $timestamps = false;
    protected $fillable = ['name', 'active', 'description'];
}

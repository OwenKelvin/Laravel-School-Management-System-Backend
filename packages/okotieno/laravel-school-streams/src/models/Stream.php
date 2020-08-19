<?php

namespace Okotieno\SchoolStreams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stream extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'abbreviation'];
}

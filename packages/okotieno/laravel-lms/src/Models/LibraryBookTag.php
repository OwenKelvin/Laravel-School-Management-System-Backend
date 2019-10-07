<?php

namespace Okotieno\LMS\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryBookTag extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'active'];
}

<?php

namespace Okotieno\LMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LibraryBookAuthor extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];
}

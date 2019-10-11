<?php

namespace App\Traits;

use App\User;
use Illuminate\Database\Eloquent\Model;

trait canBeActive
{
    public static function scopeActive($query)
    {
        return $query->where('active', true);
    }

}

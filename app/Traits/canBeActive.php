<?php

namespace App\Traits;

trait canBeActive
{
    public static function scopeActive($query)
    {
        return $query->where('active', true);
    }

}

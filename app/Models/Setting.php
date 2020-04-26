<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;

    public static function schoolPrefix(){
        return self::where('name', 'School Prefix')->first()->value;
    }

    public static function maxPlanYears(){
        return self::where('name', 'Maximum Plan Years')->first()->value;
    }

    public static function schoolName()
    {
        return self::where('name', 'School Name')->first()->value;
    }
}

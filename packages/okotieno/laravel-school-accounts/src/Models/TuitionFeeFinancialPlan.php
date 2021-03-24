<?php

namespace Okotieno\SchoolAccounts\Models;

use Illuminate\Database\Eloquent\Model;

class TuitionFeeFinancialPlan extends Model
{
    protected $fillable = [
        'amount',
        'class_level_id',
        'unit_level_id',
        'semester_id'
    ];
}

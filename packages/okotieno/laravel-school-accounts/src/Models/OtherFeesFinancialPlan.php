<?php

namespace Okotieno\SchoolAccounts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherFeesFinancialPlan extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'amount',
        'class_level_id',
        'semester_id',
        'financial_cost_item_id'
    ];
}

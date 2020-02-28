<?php

namespace Okotieno\SchoolAccounts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class FinancialCostItem extends Model
{
    use SoftDeletes;
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
}

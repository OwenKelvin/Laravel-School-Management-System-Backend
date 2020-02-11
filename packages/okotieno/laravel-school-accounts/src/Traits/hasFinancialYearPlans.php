<?php

namespace Okotieno\SchoolAccounts\Traits;

use Okotieno\SchoolAccounts\Models\TuitionFeeFinancialPlan;

trait hasFinancialYearPlans
{
    public function tuitionFeeFinancialPlans()
    {
        return $this->hasMany(TuitionFeeFinancialPlan::class);
    }
}

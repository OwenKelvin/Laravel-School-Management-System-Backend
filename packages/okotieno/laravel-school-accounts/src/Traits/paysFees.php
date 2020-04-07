<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 4/7/2020
 * Time: 10:57 AM
 */

namespace Okotieno\SchoolAccounts\Traits;
use Okotieno\SchoolAccounts\Models\FeePayment;

trait paysFees
{
    public function feePayments()
    {
        return $this->hasMany(FeePayment::class);
    }

}

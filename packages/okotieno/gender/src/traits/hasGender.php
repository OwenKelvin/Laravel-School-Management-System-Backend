<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 10/7/2019
 * Time: 11:04 AM
 */

namespace Okotieno\Gender\Traits;


use Okotieno\Gender\Models\Religion;

trait hasGender
{
    public function gender()
    {
        return $this->belongsto(Religion::class);
    }
}

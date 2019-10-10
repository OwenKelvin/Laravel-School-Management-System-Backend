<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 10/7/2019
 * Time: 11:04 AM
 */

namespace Okotieno\Religion\Traits;


use Okotieno\Religion\Models\Religion;

trait hasReligion
{
    public function religion()
    {
        return $this->belongsto(Religion::class);
    }
}

<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 10/7/2019
 * Time: 11:04 AM
 */

namespace Okotieno\NamePrefix\Traits;


use Okotieno\NamePrefix\Models\NamePrefix;

trait hasNamePrefix
{
    public function namePrefix()
    {
        return $this->belongsto(NamePrefix::class);
    }
}

<?php

namespace Okotieno\TimeTable\Traits;

use Okotieno\TimeTable\Models\TimeTable;

trait HasTimeTables
{
    public function timeTables()
    {
        return $this->hasMany(TimeTable::class);
    }
}

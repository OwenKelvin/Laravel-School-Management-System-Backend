<?php


namespace Okotieno\Teachers\Traits;


use Okotieno\SchoolCurriculum\Models\UnitLevel;

trait TeachesUnit
{
    public function teaches() {
      return $this->belongsToMany(UnitLevel::class);
    }
}

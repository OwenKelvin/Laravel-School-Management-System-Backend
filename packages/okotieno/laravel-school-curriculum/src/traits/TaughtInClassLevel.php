<?php


namespace Okotieno\SchoolCurriculum\Traits;


use Okotieno\SchoolCurriculum\Models\ClassLevel;

trait TaughtInClassLevel
{
  public function taughtInClassLevels() {
    return $this->belongsToMany(ClassLevel::class);
  }
}

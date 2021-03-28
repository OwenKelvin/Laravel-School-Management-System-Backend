<?php


namespace Okotieno\ELearning\Traits;


use Okotieno\ELearning\Models\ELearningCourse;

trait hasELearningCourse
{
  public function course()
  {
    return $this->belongsTo(ELearningCourse::class);
  }

}

<?php

namespace Okotieno\ELearning\Traits;

use Okotieno\ELearning\Models\ELearningCourseContent;

trait hasELearningContents
{
    public function eLearningContents()
    {
        return $this->hasMany(ELearningCourseContent::class);
    }

    public function getLearningContentMaterialsAttribute()
    {
        return $this->eLearningContents;
    }
}

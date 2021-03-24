<?php

namespace Okotieno\ELearning\Traits;

use Okotieno\ELearning\Models\TopicLearningOutcome;
use Okotieno\ELearning\Models\TopicNumberStyle;

trait hasLearningOutcomes
{
      public function learningOutcomes()
    {
        return $this->hasMany(TopicLearningOutcome::class);
    }

    public function getExpectedLearningOutcomesAttribute()
    {
        return $this->learningOutcomes;
    }
}

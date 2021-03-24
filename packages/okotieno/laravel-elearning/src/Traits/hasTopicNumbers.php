<?php

namespace Okotieno\ELearning\Traits;

use Okotieno\ELearning\Models\TopicNumberStyle;

trait hasTopicNumbers {
    public function getTopicNumberStyleNameAttribute()
    {
        return $this->topicNumberStyle ? $this->topicNumberStyle->name : null;
    }

    public function topicNumberStyle()
    {
        return $this->belongsTo(TopicNumberStyle::class);
    }
}

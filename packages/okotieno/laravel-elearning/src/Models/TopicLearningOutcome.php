<?php

namespace Okotieno\ELearning\Models;

use Illuminate\Database\Eloquent\Model;
use Okotieno\ELearning\Traits\hasTopicNumbers;

class TopicLearningOutcome extends Model
{
    protected $fillable = [
        'description',
        'e_learning_topic_id',
    ];
}

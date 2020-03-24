<?php

namespace Okotieno\ELearning\Models;

use Illuminate\Database\Eloquent\Model;
use Okotieno\ELearning\Traits\hasTopicNumbers;

class ELearningTopic extends Model
{
    use hasTopicNumbers;
    protected $fillable = [
        'description',
        'e_learning_course_id',
        'e_learning_topic_id',
        'topic_number_style_id'
    ];
    protected $appends = ['topic_number_style_name'];
    protected $hidden = ['topic_number_style'];

    public function subTopics()
    {
        return $this->hasMany(ELearningTopic::class);
    }

    public function saveLearningOutcome($request)
    {
        return $this->learningOutcomes()->create([
            'description' => $request->description
        ]);
    }
    public function learningOutcomes() {
        return $this->hasMany(TopicLearningOutcome::class);
    }
}

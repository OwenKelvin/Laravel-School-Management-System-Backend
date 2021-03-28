<?php

namespace Okotieno\ELearning\Models;

use Illuminate\Database\Eloquent\Model;
use Okotieno\ELearning\Traits\hasELearningContents;
use Okotieno\ELearning\Traits\hasLearningOutcomes;
use Okotieno\ELearning\Traits\hasTopicNumbers;
use Okotieno\ELearning\Traits\hasOnlineAssessment;
use Okotieno\ELearning\Traits\hasELearningCourse;

class ELearningTopic extends Model
{
    use hasTopicNumbers,
        hasLearningOutcomes,
        hasELearningContents,
        hasOnlineAssessment,
        hasELearningCourse;

  protected $fillable = [
        'description',
        'e_learning_course_id',
        'e_learning_topic_id',
        'topic_number_style_id'
    ];
    protected $appends = [
        'topic_number_style_name',
        'expected_learning_outcomes',
        'learning_content_materials',
        'online_assessments'
    ];
    protected $hidden = ['topic_number_style', 'learning_outcomes'];


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
}

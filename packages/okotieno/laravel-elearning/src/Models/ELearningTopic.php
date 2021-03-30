<?php

namespace Okotieno\ELearning\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Okotieno\ELearning\Database\Factories\ELearningTopicFactory;
use Okotieno\ELearning\Traits\hasELearningContents;
use Okotieno\ELearning\Traits\hasELearningCourse;
use Okotieno\ELearning\Traits\hasLearningOutcomes;
use Okotieno\ELearning\Traits\hasOnlineAssessment;
use Okotieno\ELearning\Traits\hasTopicNumbers;

class ELearningTopic extends Model
{
  use hasTopicNumbers,
    hasLearningOutcomes,
    hasELearningContents,
    hasOnlineAssessment,
    hasELearningCourse,
    HasFactory;

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

  public function saveLearningOutcome($request): Model
  {
    return $this->learningOutcomes()->create([
      'description' => $request->description
    ]);
  }

  protected static function newFactory(): Factory
  {

    return ELearningTopicFactory::new();

  }

}

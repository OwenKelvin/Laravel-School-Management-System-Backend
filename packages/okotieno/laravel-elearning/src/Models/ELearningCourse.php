<?php

namespace Okotieno\ELearning\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\ELearning\Traits\hasTopicNumbers;
use Okotieno\SchoolCurriculum\Models\ClassLevel;
use Okotieno\SchoolCurriculum\Models\Unit;

class ELearningCourse extends Model
{
  use softDeletes, hasTopicNumbers;

  protected $appends = ['topic_number_style_name'];

  protected $fillable = [
    'name',
    'class_level_id',
    'unit_level_id',
    'academic_year_id',
    'unit_id',
    'topic_number_style_id',
    'description'
  ];

  public function topics()
  {
    return $this->hasMany(ELearningTopic::class);
  }

  public function saveTopics($topics = [['sub_topics' => []]])
  {
    $existingTopics = $this->topics->pluck('id')->toArray();
    $updatedTopics = collect($topics)
      ->where('id', '>', 0)
      ->pluck('id')
      ->toArray();

    $deletedTopics = array_diff($existingTopics, $updatedTopics);
    $this->topics()->whereIn('id', $deletedTopics)->delete();


    foreach ($topics as $topic) {
      if ($topic['id'] > 0) {

        $newTopic = $this->topics()->find($topic['id']);
        $newTopic->update([
          'description' => $topic['description'],
          'topic_number_style_id' => TopicNumberStyle::firstOrCreate(['name' => $topic['number_label']])->id
        ]);
      } else {
        $newTopic = $this->topics()->create([
          'description' => $topic['description'],
          'topic_number_style_id' => TopicNumberStyle::firstOrCreate(['name' => $topic['number_label']])->id
        ]);
      }

      $existingSubTopics = $newTopic->subTopics->pluck('id')->toArray();
      $updatedSubTopics = collect($topic['sub_topics'])
        ->where('id', '>', 0)
        ->pluck('id')
        ->toArray();
      $deletedSubTopics = array_diff($existingSubTopics, $updatedSubTopics);
      $newTopic->subTopics()->whereIn('id', $deletedSubTopics)->delete();

      foreach ($topic['sub_topics'] as $sub_topic) {
        if ($sub_topic && key_exists('description', $sub_topic)) {
          if($sub_topic['id'] > 0) {
            $newTopic->subTopics()->find($sub_topic['id'])->update([
              'description' => $sub_topic['description'],
            ]);
          } else {
            $newTopic->subTopics()->create([
              'description' => $sub_topic['description'],
            ]);
          }
        }
      }
    }
  }

  public function classLevel()
  {
    return $this->belongsTo(ClassLevel::class);
  }

  public function academicYear()
  {
    return $this->belongsTo(AcademicYear::class);
  }

  public function getAcademicYearNameAttribute()
  {
    return $this->academicYear ? $this->academicYear->name : null;
  }

  public function getClassLevelAbbreviationAttribute()
  {
    return $this->classLevel ? $this->classLevel->abbreviation : null;
  }

  public function getClassLevelNameAttribute()
  {
    return $this->classLevel ? $this->classLevel->name : null;
  }

  public function unit()
  {
    return $this->belongsTo(Unit::class);
  }

  public function getUnitNameAttribute()
  {
    return $this->unit ? $this->unit->name : null;
  }

  public function getUnitAbbreviationAttribute()
  {
    return $this->unit ? $this->unit->abbreviation : null;
  }

  public function topicNumberingStyle()
  {
    return $this->belongsTo(TopicNumberStyle::class);
  }

  public function getTopicNumberingStyleNameAttribute()
  {
    return $this->topicNumberingStyle ? $this->topicNumberingStyle->name : null;
  }


}

<?php

namespace Okotieno\ELearning\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Okotieno\AcademicYear\Models\AcademicYear;
use Okotieno\ELearning\Traits\hasTopicNumbers;
use Okotieno\SchoolCurriculum\Models\ClassLevel;
use Okotieno\SchoolCurriculum\Unit;

class ELearningCourse extends Model
{
    use softDeletes, hasTopicNumbers;
    protected $appends = ['topic_number_style_name'];

    protected $fillable = [
        'name',
        'class_level_id',
        'academic_year_id',
        'unit_id',
        'topic_number_style_id',
        'description'
    ];

    public function topics() {
        return $this->hasMany(ELearningTopic::class);
    }

    public function saveTopics($topics = [['sub_topics' => []]])
    {
        foreach ($topics as  $topic) {
            $newTopic = $this->topics()->create([
                'description' => $topic['description'],
                'topic_number_style_id' => TopicNumberStyle::firstOrCreate(['name' => $topic['number_label']])->id
            ]);

            foreach ($topic['sub_topics'] as $sub_topic) {
                $newTopic->subTopics()->create([
                    'description' => $sub_topic,
                ]);
            }
        }
    }

    public function classLevel() {
        return $this->belongsTo(ClassLevel::class);
    }

    public function academicYear() {
        return $this->belongsTo(AcademicYear::class);
    }
    public function getAcademicYearNameAttribute() {
        return $this->academicYear ? $this->academicYear->name : null;
    }

    public function getClassLevelAbbreviationAttribute() {
        return $this->classLevel ? $this->classLevel->abbreviation : null;
    }
    public function getClassLevelNameAttribute() {
        return $this->classLevel ? $this->classLevel->name : null;
    }
    public function unit() {
        return $this->belongsTo(Unit::class);
    }
    public function getUnitNameAttribute() {
        return $this->unit ? $this->unit->name : null;
    }

    public function getUnitAbbreviationAttribute()
    {
        return $this->unit ? $this->unit->abbreviation : null;
    }

    public function topicNumberingStyle() {
        return $this->belongsTo(TopicNumberStyle::class);
    }
    public function getTopicNumberingStyleNameAttribute() {
        return $this->topicNumberingStyle ? $this->topicNumberingStyle->name : null ;
    }


}

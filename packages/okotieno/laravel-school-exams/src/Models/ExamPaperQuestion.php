<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 2/11/2020
 * Time: 7:01 PM
 */

namespace Okotieno\SchoolExams\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamPaperQuestion extends Model
{
    use softDeletes;
    protected $fillable = [
        'description',
        'correct_answer_description',
        'multiple_answers',
        'multiple_choices',
        'points'
    ];
    protected $appends = ['tags_value', 'answers_value'];
    public function answers() {
        return $this->hasMany(ExamPaperQuestionAnswer::class);
    }
    public function tags() {
        return $this->belongsToMany(ExamPaperQuestionTag::class);
    }
    public function getTagsValueAttribute() {
        return $this->tags->pluck('name');
    }
    public function getAnswersValueAttribute() {
        return $this->answers;
    }
}

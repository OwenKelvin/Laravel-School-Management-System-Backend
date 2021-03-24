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

class ExamPaperQuestionTag extends Model
{
    use softDeletes;
    protected $fillable = [
        'name'
    ];
    public function questions() {
        return $this->belongsToMany(ExamPaperQuestion::class);
    }
}

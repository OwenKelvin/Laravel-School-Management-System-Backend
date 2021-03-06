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
use Okotieno\SchoolCurriculum\Models\UnitLevel;

class OnlineAssessment extends Model
{
  use softDeletes;

  protected $fillable = [
    'title',
    'available_at',
    'closing_at',
    'period',
    'exam_paper_id'
  ];
  protected $appends = ['exam_paper_name'];
  public function examPaper() {
    return $this->belongsTo(ExamPaper::class);
  }
  public function getExamPaperNameAttribute() {
    return $this->examPaper->name;
  }
}

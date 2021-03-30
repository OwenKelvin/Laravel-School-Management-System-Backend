<?php

namespace Okotieno\ELearning\Traits;


use Okotieno\ELearning\Models\ELearningCourse;
use Okotieno\SchoolExams\Models\ExamPaper;
use Okotieno\SchoolExams\Models\OnlineAssessment;

trait hasOnlineAssessment
{

  public function examPaper()
  {
    return $this->belongsTo(ExamPaper::class);
  }

  public function onlineAssessments()
  {
    return $this->hasMany(OnlineAssessment::class);
  }

  public function getOnlineAssessmentsAttribute() {
    return OnlineAssessment::where('e_learning_topic_id', $this->id)->get();
  }

  public function saveOnlineAssessment($eLearningTopic, $request)
  {
    echo json_encode($request);
    return $request;
//    $course = ELearningCourse::find($eLearningTopic->e_learning_course_id);
//    $examPaper = ExamPaper::create([
//      'name' => $request['name'],
//      'unit_level_id' => $course->unit_level_id,
//      'created_by' => auth()->id()
//    ]);

    return $this->onlineAssessments()->create([
      'available_at' => $request['available_at'],
      'period' => $request['period'],
      'closing_at' => $request['closing_at'],
      'exam_paper_id' => $examPaper->id
    ]);
  }
}

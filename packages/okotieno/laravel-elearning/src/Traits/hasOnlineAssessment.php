<?php

namespace Okotieno\ELearning\Traits;


use Okotieno\SchoolExams\Models\ExamPaper;
use Okotieno\SchoolExams\Models\OnlineAssessment;

trait hasOnlineAssessment
{
  public function examPaper() {
    return $this->belongsTo(ExamPaper::class);
  }
  public function onlineAssessment () {
    return $this->hasMany(OnlineAssessment::class);
  }
  public function saveOnlineAssessment($request)
  {
    ExamPaper::create([
      'name' => $request['name']
    ]);
    return $this->onlineAssessment()->create([
      'available_at' => $request['available_at'],
      'period' => $request['period'],
      'closing_at' => $request['closing_at'],
    ]);
  }
}

<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 12/12/2019
 * Time: 11:28 AM
 */

namespace Okotieno\ELearning\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Okotieno\ELearning\Models\ELearningTopic;
use Okotieno\ELearning\Requests\StoreTopicOnlineAssessmentRequest;
use Okotieno\SchoolExams\Models\OnlineAssessment;

class TopicOnlineAssessmentController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return JsonResponse
   */
  public function index()
  {
    return response()->json();
  }

  public function show($topicId, OnlineAssessment $onlineAssessment)
  {
    return $onlineAssessment;
  }

  public function store(ELearningTopic $eLearningTopic, StoreTopicOnlineAssessmentRequest $request)
  {

    return response()->json([
      'saved' => true,
      'message' => 'Successfully Created online Assessment',
      $eLearningTopic->saveOnlineAssessment($eLearningTopic, $request->all())
    ])->setStatusCode(201);
  }

  public function destroy(ELearningTopic $eLearningTopic, OnlineAssessment $onlineAssessment)
  {
    $eLearningTopic->onlineAssessments()->find($onlineAssessment->id)->delete();
    return response()->json([
      'saved' => true,
      'message' => 'Successfully Deleted online Assessment',
      'data' => []
    ]);
  }
}


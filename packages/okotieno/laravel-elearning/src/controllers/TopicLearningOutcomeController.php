<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 12/12/2019
 * Time: 11:28 AM
 */

namespace Okotieno\ELearning\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\ELearning\Models\ELearningTopic;
use Okotieno\ELearning\Requests\StoreLearningOutcomeRequest;


class TopicLearningOutcomeController extends Controller
{
  public function store(StoreLearningOutcomeRequest $request, ELearningTopic $eLearningTopic)
  {
    return response()->json([
      'saved' => true,
      'message' => 'Successfully saved Learning Outcome',
      'data' => $eLearningTopic->saveLearningOutcome($request)
    ]);
  }

  public function update(Request $request, ELearningTopic $eLearningTopic, $id)
  {
    return response()->json([
      'saved' => true,
      'message' => 'Successfully updated Learning Outcome',
      'data' => $eLearningTopic->learningOutcomes()->find($id)->update([
        'description' => $request->description
      ])
    ]);
  }

  public function destroy(ELearningTopic $eLearningTopic, $id)
  {
    $eLearningTopic->learningOutcomes()->find($id)->delete();
    return response()->json([
      'saved' => true,
      'message' => 'Successfully deleted Learning Outcome'
    ]);
  }
}

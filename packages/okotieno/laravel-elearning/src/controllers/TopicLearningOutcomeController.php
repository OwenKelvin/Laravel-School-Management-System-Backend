<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 12/12/2019
 * Time: 11:28 AM
 */

namespace Okotieno\ELearning\Controllers;


use App\Http\Controllers\Controller;
use Okotieno\ELearning\Models\ELearningTopic;
use Okotieno\ELearning\Request\StoreLearningOutcomeRequest;


class TopicLearningOutcomeController extends Controller
{
    public function store(StoreLearningOutcomeRequest $request, ELearningTopic $eLearningTopic)
    {
        return response()->json([
            'saved' => true,
            'message' => 'Successfully saved Course Contents',
            'data' => $eLearningTopic->saveLearningOutcome($request)
        ]);
    }
}

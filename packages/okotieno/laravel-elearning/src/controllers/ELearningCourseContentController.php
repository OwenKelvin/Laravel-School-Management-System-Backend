<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 12/12/2019
 * Time: 11:28 AM
 */

namespace Okotieno\ELearning\Controllers;


use App\Http\Controllers\Controller;
use Okotieno\ELearning\Models\ELearningCourseContent;
use Okotieno\ELearning\Request\StoreELearningCourseContentRequest;

class ELearningCourseContentController extends Controller
{
    public function store( StoreELearningCourseContentRequest $request) {

        ELearningCourseContent::saveStudyMaterial($request);
        return response()->json([
            'saved' => true,
            'message' => 'Successfully saved Course Contents',
            'data' => []
        ]);
    }
}

<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 12/12/2019
 * Time: 11:28 AM
 */

namespace Okotieno\ELearning\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Okotieno\ELearning\Models\ELearningCourse;
use Okotieno\ELearning\Models\TopicNumberStyle;
use Okotieno\ELearning\Requests\StoreELearningCourseRequest;

class ELearningCourseController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @param Request $request
   * @param User $user
   * @return JsonResponse
   */
  public function index(Request $request)
  {

//        return ELearningCourse::limit($request->limit)->get();
    $response = [];
    foreach (ELearningCourse::limit($request->limit)->get() as $temp) {
      $response[] = [
        'id' => $temp->id,
        'name' => $temp->name,
        'class_level_name' => $temp->classLevelName,
        'class_level_abbreviation' => $temp->classLevelAbbreviation,
        'class_level_id' => $temp->class_level_id,
        'unit_level_id' => $temp->unit_level_id,
        'academic_year_id' => $temp->academic_year_id,
        'academic_year_name' => $temp->academicYearName,
        'topic_numbering_style' => $temp->topicNumberingStyleName,
        'unit_id' => $temp->unit_id,
        'unit_name' => $temp->unitName,
        'unit_abbreviation' => $temp->unitAbbreviation
      ];
    }
    return response()->json($response);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   * @param Request $request
   * @param User $user
   * @return JsonResponse
   */
  public function store(StoreELearningCourseRequest $request)
  {
    $newCourse = ELearningCourse::create([

      'name' => $request->name,
      'description' => $request->description,
      'class_level_id' => $request->class_level_id,
      'unit_level_id' => $request->unit_level_id,
      'academic_year_id' => $request->academic_year_id,
      'unit_id' => $request->unit_id,
      'topic_number_style_id' => TopicNumberStyle::firstOrCreate(['name' => $request->numbering])->id
    ]);
    $newCourse->saveTopics($request->topics);
    return response()->json([
      'saved' => true,
      'message' => 'Successfully saved Course',
      'data' => $newCourse
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param ELearningCourse $eLearningCourse
   * @return JsonResponse
   */
  public function show($eLearningCourse)
  {

    $eLearningCourse = ELearningCourse::find($eLearningCourse);
//    return $eLearningCourse->classLevel;
    $topics = $eLearningCourse->topics()->whereNull('e_learning_topic_id')->get();
    foreach ($topics as $topic) {
      $topic->subTopics;
      $topic->learningOutcomes;
      $topic->eLearningContents;
    }
    return response()->json([
      'id' => $eLearningCourse->id,
      'name' => $eLearningCourse->name,
      'description' => $eLearningCourse->description,
      'academic_year_id' => $eLearningCourse->academic_year_id,
      'academic_year_name' => $eLearningCourse->academic_year_name,
      'unit_abbreviation' => $eLearningCourse->unit_abbreviation,
      'unit_id' => $eLearningCourse->unit_id,
      'unit_name' => $eLearningCourse->unit_name,
      'class_level_id' => $eLearningCourse->class_level_id,
      'unit_level_id' => $eLearningCourse->unit_level_id,
      'class_level_abbreviation' => $eLearningCourse->class_level_abbreviation,
      'class_level_name' =>  $eLearningCourse->class_level_name,
      'topic_number_style_name' => $eLearningCourse->topic_number_style_name,
      'topics' => $topics,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param $eLearningCourse
   * @param Request $request
   * @return JsonResponse
   */
  public function update($eLearningCourse, Request $request)
  {

    $eLearningCourse =  ELearningCourse::find($eLearningCourse);
    $eLearningCourse->update([
      'academic_year_id' => $request->academic_year_id,
      'class_level_id' => $request->class_level_id,
      'unit_level_id' => $request->unit_level_id,
      'unit_id' => $request->unit_id,
      'description' => $request->description,
      'name' => $request->name,
      'topic_number_style_id' => TopicNumberStyle::firstOrCreate(['name' => $request->numbering])->id
    ]);
    $eLearningCourse->saveTopics($request->topics);
    return response()->json([
      'saved' => true,
      'message' => 'Successfully Updated Course',
      'data' => ELearningCourse::find($eLearningCourse->id)
    ]);

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param $eLearningCourse
   * @return JsonResponse
   */
  public function destroy($eLearningCourse)
  {
    $eLearningCourse = ELearningCourse::find($eLearningCourse);
    $eLearningCourse->delete();
    return response()->json([
      'saved' => true,
      'message' => 'Successfully Deleted Course',
    ]);
  }
}


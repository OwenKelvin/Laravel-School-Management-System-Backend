<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 12/12/2019
 * Time: 11:28 AM
 */

namespace Okotieno\TeacherAdmissions\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Okotieno\TeacherAdmissions\Requests\CreateTeacherRequest;

class TeacherAdmissionsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param Request $request
   * @param User $user
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, User $user)
  {
    $response = [];
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
   * @param CreateTeacherRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function store(CreateTeacherRequest $request)
  {
    $user = User::where('email', $request->email)->first();
    if ($user == null) {
      $user = User::create($request->all());
    }
    $user->makeTeacher();
    $user = User::find($user->id);
    return response()->json([
      'saved' => true,
      'message' => 'Successfully created teacher',
      'data' => [
        'id' => $user->id,
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'middle_name' => $user->middle_name,
        'other_names' => $user->other_names,
        'birth_cert_number' => $user->birth_cert_number,
        'date_of_birth' => $user->date_of_birth,
        'email' => $user->email,
        'phone' => $user->phone,
        'name_prefix_id' => $user->name_prefix_id,
        'gender_id' => $user->gender_id,
        'religion_id' => $user->religion_id,
        'teacher_id' => $user->teacher->teacher_school_id_number
      ]
    ]);
  }

  /**
   * Display th specified resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function show()
  {

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
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function update()
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @return void
   * @throws \Exception
   */
  public function destroy()
  {

  }
}

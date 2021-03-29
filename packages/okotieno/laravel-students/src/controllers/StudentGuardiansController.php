<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 12/12/2019
 * Time: 11:28 AM
 */

namespace Okotieno\Students\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Okotieno\GuardianAdmissions\Requests\User\CreateGuardianRequest;

class StudentGuardiansController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, User $user)
  {
    $response = [];
    foreach ($user->student->guardians as $guardian) {
      $response[] = [
        'id' => $guardian->user->id,
        'first_name' => $guardian->first_name,
        'last_name' => $guardian->first_name,
        'middle_name' => $guardian->first_name,
        'other_names' => $guardian->first_name,
        'gender_name' => $guardian->gender_name,
        'gender_id' => $guardian->gender_id,
        'religion_id' => $guardian->religion_id,
        'religion_name' => $guardian->religion_name,
        'date_of_birth' => $guardian->date_of_birth,
        'email' => $guardian->email,
        'phone' => $guardian->phone,
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
   */
  public function store(CreateGuardianRequest $request, User $user)
  {
    if (($student = $user->student) != null) {
      $user = $student->createGuardian($request);
      return $user;
    }
  }

  /**
   * Display the specified resource.
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

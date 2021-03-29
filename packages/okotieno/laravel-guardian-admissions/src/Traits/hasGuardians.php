<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 9/13/2019
 * Time: 10:13 PM
 */

namespace Okotieno\GuardianAdmissions\Traits;


use App\Models\User;
use Carbon\Carbon;
use Okotieno\GuardianAdmissions\Models\Guardian;

trait hasGuardians
{
  public function updateGuardian($student, $request)
  {
    $user = $student->user;
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->middle_name = $request->middle_name;
    $user->other_names = $request->other_names;
    $user->gender_id = $request->gender_id;
    $user->birth_cert_number = $request->birth_cert_number;
    $user->date_of_birth = new Carbon($request->date_of_birth);
    $user->save();
    return [
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
      'student_id' => $user->student->student_school_id_number
    ];

  }

  /**
   * @param $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function createGuardian($request)
  {
    if (($user = User::where('email', $request->email)) && $user->exists()) {
      $user = $user->first();
      if (($guardian = $user->guardian) == null) {
        if ($request->guardian_id_number != null && $request->guardian_id_number != '') {
          $idNumber = $request->religion_id_number;
        } else {
          $idNumber = Guardian::generateIdNumber();
        }
        $guardian = $user->guardian()->create([
          'guardian_id_number' => $idNumber
        ]);

      }
      $this->guardians()->detach($guardian->id);
      $this->guardians()->save($guardian, ['relationship' => $request->relation]);

    } else {
      $user = User::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'middle_name' => $request->middle_name,
        'other_names' => $request->other_names,
        'birth_cert_number' => $request->birth_cert_number,
        'date_of_birth' => new Carbon($request->date_of_birth),
        'religion_id' => $request->religion_id,
        'gender_id' => $request->religion_id,
        'phone' => $request->phone,
        'email' => $request->email,
      ]);
      if ($request->guardian_id_number != null && $request->guardian_id_number != '') {
        $idNumber = $request->religion_id_number;
      } else {
        $idNumber = Guardian::generateIdNumber();
      }

      $guardian = $user->guardian()->create([
        'guardian_id_number' => $idNumber
      ]);
      $this->guardians()->save($guardian, ['relationship' => $request->relation]);
    }
    return response()->json([
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
      'guardian_id' => $user->guardian->guardian_id_number
    ]);
  }

//    public function guardian()
//    {
//        return $this->belongsToMany(Guardian::class);
//    }
  public function guardians()
  {
    return $this->belongsToMany(Guardian::class);
  }
}

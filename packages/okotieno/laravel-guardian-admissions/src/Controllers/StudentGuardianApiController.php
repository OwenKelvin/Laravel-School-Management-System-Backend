<?php

namespace Okotieno\GuardianAdmissions\Controllers;

use App\Http\Controllers\Controller;
use Okotieno\StudentAdmissions\Models\Student;
use Okotieno\GuardianAdmissions\Requests\User\CreateGuardianRequest;
use App\User;
use Illuminate\Http\Request;

class StudentGuardianApiController extends Controller
{
    public function get(Request $request)
    {
        $student = Student::where('student_school_id_number',$request->q)->first();
        if ($student != null) {
            $guardians = $student->guardians;
            return response()->json($guardians->map(function ($guardian) {
                $user = $guardian->user;
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
                    'guardian_id' => $user->guardian->guardian_id_number
                ];
            }));
        } else return response()->json([]);
    }
}

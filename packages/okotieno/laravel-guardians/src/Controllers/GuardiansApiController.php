<?php

namespace Okotieno\Guardians\Controllers;

use App\Http\Controllers\Controller;
use Okotieno\StudentAdmissions\Models\Student;
use Okotieno\GuardianAdmissions\Requests\User\CreateGuardianRequest;
use App\User;
use Illuminate\Http\Request;

class GuardiansApiController extends Controller
{
    public function students(User $user)
    {
        $response = [];
        if ($user->guardian == null) {
            return response()->json($response);
        }

        foreach ($user->guardian->students as $student) {
            $response[] = [
                'id' => $student->user->id,
                'first_name' => $student->first_name,
                'last_name' => $student->last_name,
                'middle_name' => $student->middle_name,
                'other_names' => $student->other_names,
                'birth_cert_number' => $student->birth_cert_number,
                'date_of_birth' => $student->date_of_birth,
                'email' => $student->email,
                'phone' => $student->phone,
                'name_prefix_id' => $student->name_prefix_id,
                'gender_id' => $student->gender_id,
                'religion_id' => $student->religion_id,
                'student_id' => $student->student_school_id_number
            ];
        }

        return response()->json($response);
    }
}

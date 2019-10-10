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
            return response()->json($student->guardians);
        } else return response()->json([]);
    }
}

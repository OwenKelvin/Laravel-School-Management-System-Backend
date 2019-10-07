<?php

namespace Okotieno\StudentAdmissions\Controllers;
use App\Http\Controllers\Controller;
use Okotieno\StudentAdmissions\Models\Student;
use Okotieno\StudentAdmissions\Requests\User\CreateStudentRequest;
use App\User;
use Illuminate\Http\Request;

class StudentIdNumberController extends Controller
{
    public function get(Request $request){
        $student = Student::where('student_school_id_number', $request->q)->get()->first();
        return response()->json($student);
    }
}

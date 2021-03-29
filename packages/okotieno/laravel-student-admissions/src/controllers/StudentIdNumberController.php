<?php

namespace Okotieno\StudentAdmissions\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\StudentAdmissions\Models\Student;

class StudentIdNumberController extends Controller
{
  public function get(Request $request)
  {
    $student = Student::where('student_school_id_number', $request->q)->get()->first();
    return response()->json($student);
  }

  public function getIdentificationDetails(Request $request)
  {
    $student = Student::where('student_school_id_number', $request->q)->get()->first();
    if ($student == null) {
      abort(400, 'Student with ID: ' . $request->q . ' does not exist in the records');
    }
    return response()->json([
      'id' => $student->id,
      'first_name' => $student->first_name,
      'last_name' => $student->last_name,
      'middle_name' => $student->middle_name,
      'other_names' => $student->other_names,
      'date_of_birth' => $student->date_of_birth,
      'birth_cert_number' => $student->birth_cert_number,
      'name_prefix_id' => $student->name_prefix_id,
      'gender_id' => $student->gender_id,
      'religion_id' => $student->gender_id,
    ]);
  }
}

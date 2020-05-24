<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 12/12/2019
 * Time: 11:28 AM
 */

namespace Okotieno\Students\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Okotieno\StudentAdmissions\Models\Student;

class StudentsApiController extends Controller
{
    public function get(Request $request)
    {
        if ($request->last !== null) {
            return Student::latest()->limit($request->last)->get()->map(function ($student) {
                $user = $student->user;
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
                    'student_id' => $user->student->student_school_id_number,
                    'religion' => $user->religion_name,
                    'gender' => $user->gender_name
                ];
            })->toArray();
        }
        if ($request->id !== null) {
            $user = User::find($request->id);
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
                'student_id' => $user->student->student_school_id_number,
                'religion_name' => $user->religion_name,
                'gender_name' => $user->gender_name
            ]);
        }
        if ($request->q) {
            return User::where(
                'first_name', 'like', '%'.$request->q.'%'
            )->orWhere(
                'last_name', 'like', '%'.$request->q.'%'
            )->orWhere(
                'middle_name', 'like', '%'.$request->q.'%'
            )->get();
        }
    }
}

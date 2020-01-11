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

class StudentsApiController extends Controller
{
    public function get(Request $request)
    {
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
                'religion' => $user->religion_name,
                'gender' => $user->gender_name
            ]);
        }
    }
}

<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 9/13/2019
 * Time: 10:13 PM
 */

namespace Okotieno\StudentAdmissions\Traits;


use App\User;
use Carbon\Carbon;
use Okotieno\StudentAdmissions\Models\Student;

trait canBeAStudent
{
    public static function updateStudent($student, $request)
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
     * @return array
     */
    public static function createStudent($request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'other_names' => $request->other_names,
            'birth_cert_number' => $request->birth_cert_number,
            'date_of_birth' => new Carbon($request->date_of_birth),
            'religion_id' => $request->religion_id,
            'gender_id' => $request->gender_id
        ]);

        if ($request->student_school_id_number != null && $request->student_school_id_number != '') {
            $idNumber = $request->student_school_id_number;
        } else {
            $idNumber = Student::generateIdNumber();
        }

        $user->student()->create([
            'student_school_id_number' => $idNumber
        ]);
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

    public function student()
    {
        return $this->hasOne(Student::class);
    }
}

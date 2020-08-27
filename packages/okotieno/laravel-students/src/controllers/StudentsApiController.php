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
use Illuminate\Support\Facades\DB;
use Okotieno\AcademicYear\Models\AcademicYearUnitAllocation;
use Okotieno\StudentAdmissions\Models\Student;

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
                'religion_name' => $user->religion_name,
                'gender_name' => $user->gender_name
            ]);
        }
        if ($request->q) {
            return User::where(
                'first_name', 'like', '%' . $request->q . '%'
            )->orWhere(
                'last_name', 'like', '%' . $request->q . '%'
            )->orWhere(
                'middle_name', 'like', '%' . $request->q . '%'
            )->get();
        }

        $students = DB::table('students')
            ->leftJoin('users', function ($join) use ($request) {
                $join->on('students.user_id', '=', 'users.id');
            })
            ->leftJoin('student_unit_allocations', function ($join) use ($request) {
                $join->on('student_unit_allocations.student_id', '=', 'students.id');
            })
            ->leftJoin('academic_year_unit_allocations', function ($join) use ($request) {
                $join->on('student_unit_allocations.unit_allocation_id', '=', 'academic_year_unit_allocations.id');
            })
            ->leftJoin('academic_years', function ($join) use ($request) {
                $join->on('academic_year_unit_allocations.academic_year_id', '=', 'academic_years.id');
            })
            ->leftJoin('class_levels', function ($join) use ($request) {
                $join->on('academic_year_unit_allocations.class_level_id', '=', 'class_levels.id');
            })
            ->select([
                'users.id as id',
                'academic_years.name as academic_year_name',
                'class_levels.name as class_level_name',
                'first_name',
                'last_name',
                'middle_name',
                'academic_year_id',
                'class_level_id',
                'email',
                'other_names',
                'birth_cert_number',
                'gender_id',
                'religion_id',
                'phone',
                'student_school_id_number as student_id',
                'date_of_birth',
                'name_prefix_id'

            ])
            ->distinct();

        if ($request->academicYear) {
            $students = $students->where('academic_year_id', $request->academicYear);
        }
        if ($request->classLevels) {

            $students = $students->whereIn('class_level_id', $request->classLevels);
        }
//          TODO-me fix streams
//        if ($request->streams) {
//
//            $students = $students->whereIn('class_level_id', $request->streams);
//        }
        if ($request->last) {

            $students = $students->limit($request->last);
        }

        return response()->json($students->get());


    }
}

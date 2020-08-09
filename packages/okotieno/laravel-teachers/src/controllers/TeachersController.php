<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 12/12/2019
 * Time: 11:28 AM
 */

namespace Okotieno\Teachers\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Okotieno\Teachers\Models\Teacher;

class TeachersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $teachers = Teacher::all();
        //return Teacher::all();
        $response = [];
        foreach ($teachers as $teacher) {
            $response[] = $teacher->user;
        }
        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, User $user)
    {

        return response()->json([
            'saves' => true,
            'message' => 'Successfully allocated units to the student',
            'data' => []
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $userId
     * @return \Illuminate\Http\jsonResponse
     */
    public function show($userId)
    {
        $user = User::find($userId);
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
            'gender_name' => $user->gender_name,
            'religion_id' => $user->religion_id,
            'religion_name' => $user->religion_name,
            // 'student_id' => $user->student->student_school_id_number
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return void
     * @throws \Exception
     */
    public function destroy()
    {

    }
}


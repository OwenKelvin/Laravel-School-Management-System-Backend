<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 12/12/2019
 * Time: 11:28 AM
 */

namespace Okotieno\SupportStaffAdmissions\Controllers;


use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;
use Okotieno\PermissionsAndRoles\Models\Role;
use Okotieno\SupportStaffAdmissions\Request\CreateSupportStaffRequest;
use Okotieno\TeacherAdmissions\Request\CreateTeacherRequest;

class SupportStaffAdmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [];
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
     * @param CreateTeacherRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateSupportStaffRequest $request)
    {

        $role = Role::find($request->staff_type);
        if($role->is_staff == true) {
            $user = User::where('email', $request->email)->first();
            if ($user == null) {
                $user = User::create($request->all());
            }
            $user->assignRole($role->name);
            $user = User::find($user->id);
            return response()->json([
                'saved' => true,
                'message' => 'Successfully created '.$role->name,
                'data' => [
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
                    'religion_id' => $user->religion_id
                ]
            ]);
        } else {
            abort(416, 'Invalid Staff Type');
        }

    }

    /**
     * Display th specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

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

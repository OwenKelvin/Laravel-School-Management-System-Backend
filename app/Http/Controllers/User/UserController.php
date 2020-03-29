<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function update(Request $request, User $user)
    {
        if ($request->profile_pic_id) {
            $user->saveProfilePic($request);
        }
        if(key_exists('first_name', $request->all())){
            $request->validate([
               'first_name' => 'required'
            ]);
            $user->first_name = $request->first_name;
            $user->save();
        }
        if(key_exists('last_name', $request->all())){
            $request->validate([
                'last_name' => 'required'
            ]);
            $user->last_name = $request->last_name;
            $user->save();
        }

        if(key_exists('middle_name', $request->all())){
            $user->middle_name = $request->middle_name;
            $user->save();
        }
        if(key_exists('other_names', $request->all())){
            $user->other_names = $request->other_names;
            $user->save();
        }

        if(key_exists('religion_id', $request->all())){
            $user->religion_id = $request->religion_id;
            $user->save();
        }
        if(key_exists('gender_id', $request->all())){
            $user->gender_id = $request->gender_id;
            $user->save();
        }
        if(key_exists('date_of_birth', $request->all())){
            $user->date_of_birth = $request->date_of_birth;
            $user->save();
        }

        return [
            'saved' => true,
            'message' => 'User Info successfully saved'
        ];

    }


}

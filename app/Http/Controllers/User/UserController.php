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

        return [
            'saved' => true,
            'message' => 'User Info successfully saved'
        ];

    }


}

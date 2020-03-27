<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserApiController extends Controller
{
    public function getUserByEmail(Request $request)
    {
        $request->validate(['q' => 'required']);
        return User::where('email', $request->q)->first();
    }


}

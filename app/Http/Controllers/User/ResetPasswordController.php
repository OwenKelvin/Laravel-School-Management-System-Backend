<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PasswordToken;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function tokenLogin(Request $request)
    {
        return response()->json(PasswordToken::getUserForToken($request->token)
            ->createToken('UserToken', ['*']));
    }
}

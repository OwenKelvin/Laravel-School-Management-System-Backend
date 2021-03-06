<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
  public function getUserByEmail(Request $request)
  {
    $request->validate(['q' => 'required']);
    return User::where('email', $request->q)->first();
  }

  public function authenticatedUser()
  {
    $user = User::find(auth()->id());
    $response = $user->toArray();

    $response['permissions'] = $user->getAllPermissions()->pluck('name')->toArray();
    $response['roles'] = $user->roles->pluck('name')->toArray();
    return response()->json($response);
  }

}

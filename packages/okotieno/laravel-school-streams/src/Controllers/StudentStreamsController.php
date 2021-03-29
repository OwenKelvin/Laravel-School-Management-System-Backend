<?php


namespace Okotieno\SchoolStreams\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentStreamsController extends Controller
{
  public function get(User $user, Request $request)
  {
    return response()->json(
      $user->student->streams()
        ->where($request->all())
        ->first()
    );
  }

}

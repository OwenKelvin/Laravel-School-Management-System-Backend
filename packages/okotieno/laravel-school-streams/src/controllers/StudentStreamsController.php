<?php


namespace Okotieno\SchoolStreams\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Okotieno\SchoolStreams\Models\Stream;

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

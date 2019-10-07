<?php

namespace Okotieno\LMS\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\LMS\Models\LibraryBookPublisher;

class LibraryBookPublisherController extends Controller
{
    public function all()
    {
        return response(LibraryBookPublisher::all());
    }
    public function filter(Request $request)
    {
        if($request->publisher_id != null){
            return response(
                LibraryBookPublisher::find($request->publisher_id)
            );
        }
        return response(
            LibraryBookPublisher::where('name', 'LIKE', '%' . $request->name . '%')->get()
        );
    }
}

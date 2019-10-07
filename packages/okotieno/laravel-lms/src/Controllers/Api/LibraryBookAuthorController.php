<?php

namespace Okotieno\LMS\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\LMS\Models\LibraryBookAuthor;

class LibraryBookAuthorController extends Controller
{
    public function all()
    {
        return response(LibraryBookAuthor::all());
    }

    public function filter(Request $request)
    {
        if($request->author_id != null){
            return response(
                LibraryBookAuthor::find($request->author_id)
            );
        }
        return response(
            LibraryBookAuthor::where('name', 'LIKE', '%' . $request->name . '%')->get()
        );
    }
}

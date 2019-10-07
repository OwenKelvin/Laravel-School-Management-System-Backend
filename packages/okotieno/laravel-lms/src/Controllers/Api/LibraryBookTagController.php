<?php

namespace Okotieno\LMS\Controllers\Api;

use Illuminate\Http\Request;
use Okotieno\LMS\Models\LibraryBookTag;

class LibraryBookTagController extends \App\Http\Controllers\Controller
{
    public function all()
    {
        return LibraryBookTag::all();
    }

    public function filter(Request $request)
    {
        if($request->tag_id != null){
            return LibraryBookTag::find($request->tag_id);
        }

        return response(
            LibraryBookTag::where('name', 'LIKE', '%' . $request->name . '%')->get()
        );
    }
}

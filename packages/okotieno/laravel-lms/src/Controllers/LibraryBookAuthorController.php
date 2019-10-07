<?php

namespace Okotieno\LMS\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\LMS\Models\LibraryBookAuthor;
use Okotieno\LMS\Request\StoreLibraryBookAuthorRequest;

class LibraryBookAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('okotieno.lms.books.add_books');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLibraryBookAuthorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibraryBookAuthorRequest $request)
    {
        LibraryBookAuthor::create([
            'name' => $request->name
        ]);
        return response()->json([
            'saved' => true,
            'message' => 'Author saved Successfully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param LibraryBookAuthor $libraryBookAuthor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LibraryBookAuthor $libraryBookAuthor)
    {
        $libraryBookAuthor->update($request->all());
        return response()->json([
            'saved' => true,
            'message' => 'Author Updated Successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

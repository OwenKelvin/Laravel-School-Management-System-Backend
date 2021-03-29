<?php

namespace Okotieno\LMS\Controllers;

use App\Http\Controllers\Controller;
use Okotieno\LMS\Models\LibraryBookTag;
use Illuminate\Http\Request;
use Okotieno\LMS\Requests\StoreLibraryBookTagRequest;

class LibraryBookTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLibraryBookTagRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibraryBookTagRequest $request)
    {

        $input = [
          'name' => $request->name,
        ];
        $createdTag = LibraryBookTag::create($input);
        return response()->json([
            'message' => 'Tag Created Successfully',
            'saved' => true,
            'data' => $createdTag
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LibraryBookTag $libraryBookTag)
    {
        return response()->json($libraryBookTag);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $input = [
            'name' => $request->name,
        ];
        if($request->active != null){
            $input['active'] = $request->active;
        }
        $task = LibraryBookTag::findOrFail($id);
        $task->update($input);
        return response()->json([
            'message' => 'Tag Updated Successfully',
            'saved' => true,
            'data' => LibraryBookTag::find($id)
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
        LibraryBookTag::destroy($id);
        return response()->json([
            'message' => 'Tag Deleted Successfully',
            'saved' => true,
        ]);
    }
}

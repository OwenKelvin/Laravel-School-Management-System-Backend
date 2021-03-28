<?php

namespace Okotieno\LMS\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Okotieno\LMS\Models\LibraryBook;
use Okotieno\LMS\Models\LibraryBookItem;
use Okotieno\LMS\Requests\StoreLibraryBookItemRequest;
use Okotieno\LMS\Requests\UpdateLibraryBookItemRequest;

class LibraryBookItemController extends Controller
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
     * @param LibraryBook $libraryBook
     * @param StoreLibraryBookItemRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibraryBook $libraryBook, StoreLibraryBookItemRequest $request)
    {
        $procument_date = Carbon::now();
        if ($request->procurement_date != null && $request->procurement_date != "") {
            $procument_date = Carbon::createFromTimeString($request->procurement_date);
        }
        $libraryBook->libraryBookItems()->create([
            'ref' => $request->ref,
            'procurement_date' => $procument_date,
            'reserved' => $request->reserved
        ]);

        return response()->json([
            'saved' => true,
            'message' => 'Book saved Successfully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLibraryBookItemRequest $request
     * @param LibraryBook $libraryBook
     * @param LibraryBookItem $libraryBookItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLibraryBookItemRequest $request, LibraryBook $libraryBook, LibraryBookItem $libraryBookItem)
    {
        $libraryBookItem->update([
            'ref' => $request->ref,
            'reserved' => $request->reserved,
            'procurement_date' => $request->procurement_date
        ]);
        return response()->json([
            'saved' => true,
            'message' => 'Book saved Successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LibraryBook $libraryBook
     * @param LibraryBookItem $libraryBookItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(LibraryBook $libraryBook, LibraryBookItem $libraryBookItem)
    {
        LibraryBookItem::destroy($libraryBookItem->id);
        return response()->json([
            'saved' => true,
            'message' => 'Book Item Deleted Successfully',
        ]);
    }
}

<?php

namespace Okotieno\LMS\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Okotieno\LMS\Models\LibraryBook;
use Okotieno\LMS\Models\LibraryBookItem;
use Okotieno\LMS\Requests\StoreLibraryBookReturnRequest;

class LibraryBookReturnController extends Controller
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
     * @param StoreLibraryBookReturnRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibraryBookReturnRequest $request)
    {
        $book = LibraryBookItem::withRef($request->ref);

        $error_messages = [];
        if ($book == null) {
            $error_messages['ref'] = ['The Book Reference is Invalid'];
        }
        if(sizeof($error_messages) > 0){
            $error = \Illuminate\Validation\ValidationException::withMessages($error_messages);
            throw $error;
        }

        try {
            $book->markAsReturned();
        } catch (\Exception $e) {
            $error = \Illuminate\Validation\ValidationException::withMessages(
                ['ref' => ['The book with ref '. $request->ref. ' has not been issued']]
            );
            throw $error;
        }

//        return $book;

        return response()->json([
            'saved' => true,
            'message' => 'Book Marked as Returned Successfully'
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
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

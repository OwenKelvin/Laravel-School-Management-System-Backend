<?php

namespace Okotieno\LMS\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\LMS\Models\LibraryBook;
use Okotieno\LMS\Models\LibraryBookAuthor;
use Okotieno\LMS\Models\LibraryBookPublisher;
use Okotieno\LMS\Models\LibraryBookTag;
use Okotieno\LMS\Models\LibraryClass;
use Okotieno\LMS\Request\StoreLibraryBookRequest;

class LibraryBookController extends Controller
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
     * @param StoreLibraryBookRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibraryBookRequest $request)
    {
        $created_book = LibraryBook::create([
            'title' => $request->title,
            'ISBN' => $request->ISBN,
            'publication_date' => $request->publication_date,
        ]);
        $created_book->libraryClasses()->save(LibraryClass::find($request->category));
        foreach ($request->authors as $author){
            $created_book->libraryBookAuthors()->save(LibraryBookAuthor::find($author));
        }
        foreach ($request->publishers as $author){
            $created_book->libraryBookPublishers()->save(LibraryBookPublisher::find($author));
        }

        foreach ($request->tags as $tag){
            $created_book->libraryBookTags()->save(LibraryBookTag::find($tag));
        }

        return response()->json([
            'saved' => true,
            'message' => 'Book saved Successfully',
            'data' => [
                'id' => $created_book->id,
                'title' => $created_book->title,
                'ISBN' => $created_book->ISBN,
                'publisher' => $created_book->publisher,
                'publication_date' => $created_book->publication_date,
                'category' => $created_book->library_class_id,
                'tags' => $created_book->libraryBookTags,
                'publishers' => $created_book->libraryBookPublishers,
                'libraryClasses' => $created_book->libraryClasses
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LibraryBook $libraryBook)
    {
        $libraryBook->libraryBookAuthors;
        $libraryBook->libraryBookItems;
        $libraryBook->libraryBookPublishers;
        $libraryBook->libraryBookTags;
        $libraryBook->libraryClasses;
        return response()->json($libraryBook);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LibraryBook $libraryBook
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('okotieno.lms.books.edit_books');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LibraryBook $libraryBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(LibraryBook $libraryBook)
    {
        LibraryBook::destroy($libraryBook->id);
        return response()->json([
            'saved' => true,
            'message' => 'Book saved Successfully'
            ]);
    }
}

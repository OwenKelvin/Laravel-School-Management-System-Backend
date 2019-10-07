<?php

namespace Okotieno\LMS\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\LMS\Models\BookIssue;
use Okotieno\LMS\Models\LibraryBook;
use Okotieno\LMS\Models\LibraryClassification;
use DB;

class LibraryBookController extends Controller
{
    public function filter(Request $request)
    {
        $book = LibraryBook::find($request->book_id);
        if ($book != null) {
            return response()->json($book->details());
        }
//        if ($request->tag == null && $request->publisher == null && $request->author == null) {
//            return LibraryBook::collectionDetails(LibraryBook::all());
//        }
        $books = LibraryBook::filter($request)
            ->get()
            ->pluck('id')
            ->unique();
        return LibraryBook::collectionDetails(LibraryBook::find($books));
    }

    public function getAllIssuedBooks()
    {
        $response = [];
        $issued_books = BookIssue::all();

        foreach ($issued_books as $issued_book) {
//            $issued_book->user;
//            $issued_book->libraryBookItem;
            $response[] = [
                "name" => $issued_book->user->name,
                "id" => $issued_book->id,
                "book_id" => $issued_book->libraryBookItem->libraryBook->id,
                "category" => $issued_book->libraryBookItem->libraryBook->libraryClass->name,
                "publisher" => $issued_book->libraryBookItem->libraryBook->publisher,
                "publication_date" => $issued_book->libraryBookItem->libraryBook->publication_date,
                "title" => $issued_book->libraryBookItem->libraryBook->title,
                "ISBN" => $issued_book->libraryBookItem->libraryBook->ISBN,
                "ref" => $issued_book->libraryBookItem->ref,
                "borrowed_date" => $issued_book->issue_date,
                "due_date" => $issued_book->due_date,
                "returned_date" => $issued_book->returned_date,
            ];
        }
        return response()->json($response);
    }

    public function getMyAccount()
    {
        return auth()->user()->allBorrowedBooks();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */

    public function getAll()
    {
        $libraryBooks = LibraryBook::all();
        return response()->json(LibraryBook::collectionDetails($libraryBooks));
    }

    public function getClasses(Request $request)
    {
        $response = [];
        $classes = LibraryClassification::ofType($request->classification)
            ->libraryClasses
            ->where('library_class_id', null);
        foreach ($classes as $key => $item) {
            $response[] = [
                'id' => $item['id'],
                'class' => $item['class'],
                'name' => $item['name'],
                'classes' => $item['classes'],
            ];
        }

        return response()->json($response);
    }

    public function get(Request $request)
    {
        //return $request->all();
        return LibraryClassification::all();
    }
}

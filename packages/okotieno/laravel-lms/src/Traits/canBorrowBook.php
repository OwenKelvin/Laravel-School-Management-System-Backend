<?php

namespace Okotieno\LMS\Traits;

use Carbon\Carbon;
use Okotieno\LMS\Models\LibraryBookItem;

trait canBorrowBook
{

    public function allBorrowedBooks()
    {
        $response = [];
        foreach ($this->libraryBookItems as $libraryBookItem) {
            $libraryBook = $libraryBookItem->libraryBook;
            $response[] = [
                'title' => $libraryBook['title'],
                'publisher' => $libraryBook['publisher'],
                'publication_date' => $libraryBook['publication_date'],
                'ref' => $libraryBookItem['ref'],
                'borrowed_date' => $libraryBookItem->pivot->issue_date,
                'due_date' => $libraryBookItem->pivot->due_date,
                'returned_date' => $libraryBookItem->pivot->returned_date,
                'category' => $libraryBook->libraryClass->name
            ];

        }
        return $response;
    }

    public function libraryBookItems()
    {
        return $this->belongsToMany(LibraryBookItem::class, 'book_issues')
            ->withPivot(['issue_date', 'due_date', 'returned_date']);
    }

    public function hasBorrowedBook($book)
    {
        $this->libraryBookItems()->save($book, [
            'issue_date' => Carbon::now()
        ]);
    }
}

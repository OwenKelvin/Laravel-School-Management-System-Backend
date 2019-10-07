<?php

namespace Okotieno\LMS\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use DB;

class LibraryBook extends Model
{
    protected $fillable = ['title', 'publisher', 'publication_date', 'ISBN'];

    public static function filter($request)
    {
        $query = DB::table('library_books AS lb')
            ->leftJoin('library_book_library_book_author AS lb_lba', 'lb.id', '=', 'lb_lba.library_book_id')
            ->leftJoin('library_book_library_book_publisher AS lb_lbp', 'lb.id', '=', 'lb_lbp.library_book_id')
            ->leftJoin('library_book_authors as lba', 'lba.id', '=', 'lb_lba.library_book_author_id')
            ->leftJoin('library_book_publishers AS lbp', 'lbp.id', '=', 'lb_lbp.library_book_publisher_id')
            ->leftJoin('library_book_library_book_tag AS lb_lbt', 'lb.id', '=', 'lb_lbt.library_book_id')
            ->leftJoin('library_book_tags AS lbt', 'lbt.id', '=', 'lb_lbt.library_book_tag_id')
            ->where('lb.title', 'LIKE', '%' . $request->title . '%')
            ->where('lba.name', 'LIKE', '%' . $request->author . '%')
            ->where('lbp.name', 'LIKE', '%' . $request->publisher . '%');

        if($request->tag != null){
            $query = $query->where('lbt.name', 'LIKE', '%' . $request->tag . '%');
        }
        return $query
            ->select('lb.id AS id');
    }

    public static function collectionDetails(Collection $books)
    {
        return $books->map(function ($book) {
            return $book->details();
        });
    }

    public function details()
    {
        $book = $this;
        $checked_out = BookIssue::findMany($book->libraryBookItems
            ->pluck('id'))
            ->where('returned_date', NULL)->count();
        $count = $book->libraryBookItems->count();
        $reserves = $book->minimum_reserve;
        return [
            'id' => $book->id,
            'title' => $book->title,
            'ISBN' => $book->ISBN,
            'publishers' => $book->libraryBookPublishers->pluck('name'),
            'publication_date' => $book->publication_date,
            'volume' => $book->volume,
            'book_items' => $book->libraryBookItems,
            'category' => $book->libraryClasses->pluck('name'),
            "reserves" => $reserves,
            "available" => $count - $reserves - $checked_out,
            "library_class_ids" => $book->libraryClasses->pluck('id'),
            "max_borrowing_days" => $book->max_borrowing_days,
            "max_borrowing_hours" => $book->max_borrowing_hours,
            "overdue_charge_per_hour" => $book->overdue_charge_per_hour,
            "count" => $count,
            "checked_out_count" => $checked_out,
        ];
    }

    public function libraryBookTags()
    {
        return $this->BelongsToMany(LibraryBookTag::class);
    }

    public function libraryBookAuthors()
    {
        return $this->BelongsToMany(LibraryBookAuthor::class);
    }

    public function libraryClasses()
    {
        return $this->belongsToMany(LibraryClass::class);
    }

    public function libraryBookItems()
    {
        return $this->hasMany(LibraryBookItem::class);
    }

    public function libraryBookPublishers()
    {
        return $this->BelongsToMany(LibraryBookPublisher::class);
    }
}

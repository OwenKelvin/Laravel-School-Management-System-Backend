<?php

namespace Okotieno\LMS\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class LibraryBookItem extends Model
{
    use SoftDeletes;
    protected $fillable = ['ref', 'procurement_date', 'reserved'];

    public static function withRef($ref)
    {
        return self::where('ref', $ref)->first();
    }

    public function markAsReturned()
    {
        $book_issue = BookIssue::where('library_book_item_id', $this->id)
            ->whereNull('returned_date')
            ->first();
        $book_issue->returned_date = Carbon::now();
        $book_issue->save();

    }
    public function libraryBook(){
        return $this->belongsTo(LibraryBook::class);
    }
}

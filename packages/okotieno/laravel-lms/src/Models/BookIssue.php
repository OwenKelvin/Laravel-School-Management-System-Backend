<?php

namespace Okotieno\LMS\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BookIssue extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function libraryBookItem(){
        return $this->belongsTo(LibraryBookItem::class);

    }
}

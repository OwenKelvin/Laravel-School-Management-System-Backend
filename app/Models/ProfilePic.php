<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfilePic extends Model
{
    use softDeletes;
    protected $fillable = [
        'file_document_id',
        'user_id'
    ];

    public function fileDocument()
    {
        return $this->belongsTo(FileDocument::class);
    }
}

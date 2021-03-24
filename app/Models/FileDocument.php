<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Okotieno\LMS\Traits\hasFileDocuments;

class FileDocument extends Model
{
    use hasFileDocuments;
    protected $fillable = [
        'name',
        'type',
        'extension',
        'mme_type',
        'size',
        'file_path'
    ];

}

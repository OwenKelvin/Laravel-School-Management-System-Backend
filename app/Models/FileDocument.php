<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileDocument extends Model
{
    protected $fillable = [
        'name',
        'type',
        'extension',
        'mme_type',
        'size',
        'file_path'
    ];
}

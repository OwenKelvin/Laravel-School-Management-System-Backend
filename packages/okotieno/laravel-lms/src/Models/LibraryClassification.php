<?php

namespace Okotieno\LMS\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryClassification extends Model
{
    protected $table = 'library_classifications';

    protected $fillable = [
        'name', 'abbr'
    ];

    public $timestamps = false;

    public function libraryClasses()
    {
        return $this->hasMany(LibraryClass::class);
    }

    public static function ofType($abbr)
    {
        return self::where('abbr', $abbr)->first();
    }
}

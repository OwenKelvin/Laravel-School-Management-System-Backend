<?php

namespace Okotieno\LMS\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryClass extends Model
{
    public function libraryClasses()
    {
        return $this->hasMany(LibraryClass::class);
    }

    protected $table = 'library_classes';

    protected $fillable = [
        'name', 'library_classification_id', 'library_class_id', 'class'
    ];

    protected $hidden = ["library_classes"];

    protected $appends = ['classes'];

    public $timestamps = false;

    public function libraryClassificationSystem()
    {
        return $this->belongsTo(LibraryClassification::class);
    }

    public function getClassesAttribute()
    {
        return $this->libraryClasses->map(function ($item) {
            return [
                'id' => $item['id'],
                'class' => $item['class'],
                'name' => $item['name'],
                'classes' => $item['classes'],
            ];
        });
    }

}

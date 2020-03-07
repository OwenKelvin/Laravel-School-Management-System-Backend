<?php

namespace Okotieno\StudyMaterials\Models;

use Illuminate\Database\Eloquent\Model;

class StudyMaterialDoc extends Model
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

<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 3/7/2020
 * Time: 7:00 PM
 */

namespace App\Traits;


use App\Models\FileDocument;

trait canSaveFileDocument
{
    public function uploadFileDocument() {
        return $this->hasMany(FileDocument::class);
    }
}

<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 3/7/2020
 * Time: 7:00 PM
 */

namespace App\Traits;


use App\Models\FileDocument;
use App\Models\ProfilePic;

trait canSaveFileDocument
{
    public function uploadFileDocument()
    {
        return $this->hasMany(FileDocument::class);
    }

    public function saveProfilePic($request)
    {
        $this->profilePictures()->create([
            'file_document_id' => $request->profile_pic_id
        ]);
    }

    public function profilePictures()
    {
        return $this->hasMany(ProfilePic::class);
    }
}

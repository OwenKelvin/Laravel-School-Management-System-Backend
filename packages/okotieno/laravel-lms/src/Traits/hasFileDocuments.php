<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 4/2/2020
 * Time: 6:22 AM
 */

namespace Okotieno\LMS\Traits;


use App\Models\ProfilePic;

trait hasFileDocuments
{
    public function profilePics()
    {
        return $this->belongsToMany(ProfilePic::class);
    }

}

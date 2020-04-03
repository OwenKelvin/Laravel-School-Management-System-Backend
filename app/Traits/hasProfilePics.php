<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 4/2/2020
 * Time: 5:33 PM
 */

namespace App\Traits;


use App\Models\ProfilePic;

trait hasProfilePics
{
    public function profilePics() {
        return $this->belongsToMany(ProfilePic::class);
    }

    public function getProfilePicIdAttribute() {
        return $this->profilePics ? $this->profilePics : null;
    }
}

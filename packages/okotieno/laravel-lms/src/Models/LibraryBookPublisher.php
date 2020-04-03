<?php

namespace Okotieno\LMS\Models;

use App\Models\FileDocument;
use App\Models\ProfilePic;
use App\Traits\hasProfilePics;
use Illuminate\Database\Eloquent\Model;

class LibraryBookPublisher extends Model
{
    use hasProfilePics;
    protected $fillable = ['name', 'biography'];

    protected $appends = ['profile_pic_id'];

}

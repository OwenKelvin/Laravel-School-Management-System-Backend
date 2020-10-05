<?php

namespace Okotieno\ELearning\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopicNumberStyle extends Model
{
    use softDeletes;
    public $timestamps = false;
}

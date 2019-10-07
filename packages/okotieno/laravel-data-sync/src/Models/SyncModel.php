<?php

namespace Okotieno\DataSync\Models;

use Illuminate\Database\Eloquent\Model;

class SyncModel extends Model
{
    public static function withClassName($class_name)
    {
        return self::where('model_class', $class_name)->first();
    }

    public function syncs()
    {
        return $this->hasMany(Sync::class);
    }
}

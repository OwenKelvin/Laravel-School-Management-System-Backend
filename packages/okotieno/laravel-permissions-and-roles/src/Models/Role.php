<?php

namespace Okotieno\PermissionsAndRoles\Models;

use Illuminate\Database\Eloquent\Builder;

class Role extends \Spatie\Permission\Models\Role
{
  public static function scopeStaffs(Builder $query): Builder
  {
    return $query->where('is_staff', true);
  }
}

<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 1/10/2020
 * Time: 8:05 PM
 */

namespace Okotieno\Procurement\Models;


use Illuminate\Database\Eloquent\Model;

class ProcurementVendor extends Model
{
  protected $fillable = [
    'name',
    'description',
    'physical_address',
    'active'
  ];

  public function contacts()
  {
    return $this->hasMany(ProcurementVendorContact::class);
  }

  public function delivers()
  {
    return $this->belongsToMany(ProcurementItemsCategory::class);
  }
}

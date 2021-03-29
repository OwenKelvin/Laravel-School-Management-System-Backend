<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 1/10/2020
 * Time: 8:05 PM
 */

namespace Okotieno\Procurement\Models;


use Illuminate\Database\Eloquent\Model;

class ProcurementTender extends Model
{
  protected $appends = ['bids'];
  protected $fillable = [
    'expiry_datetime',
    'description',
    'procurement_request_id'
  ];

  public function procurementRequest()
  {
    return $this->belongsTo(ProcurementRequest::class);
  }

  public function procurementTenderBids()
  {
    return $this->hasMany(ProcurementBid::class, 'tender_id');
  }

  public function getBidsAttribute()
  {
    return $this->procurementTenderBids;
  }

  public function scopeAwarded($query)
  {
    return $query->whereHas('procurementTenderBids', function ($q) {
      $q->where('awarded', true);
    });
  }

  public function fulfilled()
  {
    return $this->hasOne(ProcurementFulfill::class);
  }
}

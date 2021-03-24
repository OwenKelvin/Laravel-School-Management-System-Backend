<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 1/10/2020
 * Time: 8:05 PM
 */

namespace Okotieno\Procurement\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class ProcurementBid extends Model
{
    protected $appends = ['vendor_name'];
    protected $fillable = [
        'price_per_unit',
        'description',
        'unit_description',
        'vendor_id',
        'tender_id',
        'price_per_unit'
    ];
    public function procurementRequest(){
        return $this->procurementTender->belongsTo(ProcurementRequest::class);
    }
    public function procurementTender(){
        return $this->belongsTo(ProcurementTender::class);
    }
    public function procurementVendor() {
        return $this->belongsTo(ProcurementVendor::class, 'vendor_id');
    }
    public function getVendorNameAttribute() {
        return $this->procurementVendor->name;
    }
}

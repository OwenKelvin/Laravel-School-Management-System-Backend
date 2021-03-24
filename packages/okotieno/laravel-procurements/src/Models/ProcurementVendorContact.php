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

class ProcurementVendorContact extends Model
{
    protected $fillable = [
        'name',
        'is_phone',
        'is_email',
        'value',
        'procurement_vendor_id'
    ];
}

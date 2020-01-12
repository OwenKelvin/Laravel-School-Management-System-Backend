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

class ProcurementRequest extends Model
{
    protected $appends = ['requesting_user'];
    protected $fillable = [
        'requested_by',
        'name',
        'description',
        'quantity_description',
        'procurement_items_category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }
    public function approved() {
        return $this->hasMany(ProcurementApproval::class);
    }
    public static function pendingApproval()
    {
        return ProcurementRequest::doesnthave('approved')->get();
    }
    public function getRequestingUserAttribute() {
        return $this->user;
    }
}

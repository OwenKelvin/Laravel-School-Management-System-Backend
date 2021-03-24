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
    protected $hidden = ['tendered', 'user'];
    protected $appends = ['requesting_user', 'tenders'];
    protected $fillable = [
        'requested_by',
        'name',
        'description',
        'quantity_description',
        'procurement_items_category_id'
    ];
    public function getTendersAttribute() {
        return $this->tendered;
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }
    public function approved() {
        return $this->hasMany(ProcurementApproval::class);
    }
    public function tendered() {
        return $this->hasMany(ProcurementTender::class);
    }
    public static function pendingApproval()
    {
        return ProcurementRequest::doesnthave('approved')->get();
    }
    public static function pendingTendering()
    {
        $response = [];
        $requests = ProcurementRequest::doesnthave('tendered')
            ->has('approved')
            ->get();
        foreach ($requests as $request) {
            if ($request->approved->last()->approved) {
                $response[] = $request;
            }

        }
        return $response;
    }

    public function getRequestingUserAttribute() {
        return $this->user;
    }
    public static function approvedForBidding() {
        return ProcurementRequest::has('tendered')->get();
    }
}

<?php

namespace Okotieno\SchoolAccounts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeePayment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'amount',
        'ref',
        'payment_method_id',
        'transaction_date'
    ];
    protected $hidden = ['deleted_at'];
    protected $appends = ['payment_method_name'];

    public function getPaymentMethodNameAttribute(){
        return PaymentMethod::find($this->payment_method_id)->name;
    }
}

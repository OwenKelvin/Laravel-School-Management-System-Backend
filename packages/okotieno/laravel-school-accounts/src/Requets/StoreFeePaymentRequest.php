<?php

namespace Okotieno\SchoolAccounts\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('receive student fee payment');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required',
            'payment_method_id' => 'required',
            'transaction_date' => 'required|date',
            //
        ];
    }
    public function messages()
    {
        return [
            'amount.required' => 'Amount of Payment is required',
            'payment_method_id.required'  => 'Payment Method is required',
            'transaction_date.required' => 'Transaction Date is required',
            ];
    }
}

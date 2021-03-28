<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 1/10/2020
 * Time: 7:59 PM
 */

namespace Okotieno\Procurement\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ProcurementBidCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create procurement bid');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price_per_unit' => 'required',
            'vendor_id' => 'required',
            'unit_description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'price_per_unit.required' => 'Price Per Unit field is required',
            'price_per_unit.double' => 'Price Per Unit field is invalid',
            'vendor_id.required' => 'Vendor field is invalid',
            'unit_description.required' => 'Unit Description field is required',
        ];
    }
    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'You are not authorised to create a procurement tender'
        );
    }
}

<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 1/10/2020
 * Time: 7:59 PM
 */

namespace Okotieno\Procurement\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ProcurementTenderCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create procurement tender');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'expiry_datetime' => 'required',
            'procurement_request_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'expiry_datetime.required' => 'Expiry DateTime is required',
            'procurement_request_id.required' => 'Procurement request is required'
        ];
    }
    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'You are not authorised to create a procurement tender'
        );
    }
}

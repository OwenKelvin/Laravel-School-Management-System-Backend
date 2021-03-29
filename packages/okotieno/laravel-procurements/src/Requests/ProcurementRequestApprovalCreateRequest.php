<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 1/10/2020
 * Time: 7:59 PM
 */

namespace Okotieno\Procurement\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ProcurementRequestApprovalCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('approve procurement request');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'approve' => 'required',
            'procurement_request_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'approve.required' => 'Approve/Reject field is required',
            'procurement_request_id.required' => 'Id of Item to approve is required'
        ];
    }
    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'You are not authorised to approve a procurement request'
        );
    }
}

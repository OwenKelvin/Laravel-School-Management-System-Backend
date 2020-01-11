<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 1/10/2020
 * Time: 7:59 PM
 */

namespace Okotieno\Procurement\Request;


use Illuminate\Foundation\Http\FormRequest;

class ProcurementRequestCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('make procurement request');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'procurement_items_category_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name of item to be procured is required',
            'procurement_items_category_id.required' => 'Item Category is required'
        ];
    }
    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'You are not authorised to make a procurement request'
        );
    }
}

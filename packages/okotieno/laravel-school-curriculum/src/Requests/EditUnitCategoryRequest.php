<?php

namespace Okotieno\SchoolCurriculum\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUnitCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('edit subject curriculum');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:unit_categories'
        ];
    }

}

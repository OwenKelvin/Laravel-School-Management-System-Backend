<?php

namespace Okotieno\SchoolCurriculum\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUnitCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create subject curriculum');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // TODO Check if unique:unit_categories,name,deleted_at is okay
            'name' => 'required|unique:unit_categories,name,deleted_at'
        ];
    }
    public function messages()
    {
        return [
            'name.unique' => 'The Unit/Subject category name already exists',
            'name.required'=> 'The Unit/Subject category is required'
        ];
    }
}

<?php

namespace Okotieno\SchoolCurriculum\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClassLevelCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create class level');
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
        ];
    }
    public function messages()
    {
        return [
            'name.required'=> 'The name field is required',
        ];
    }
}

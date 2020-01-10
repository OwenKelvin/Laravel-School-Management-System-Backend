<?php

namespace Okotieno\AcademicYear\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAcademicYearRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create academic year');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:academic_years',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=> 'The name field is required',
            'start_date.required' => 'The start date field required',
            'end_date.required' => 'The start date field required',
            'name.unique' => 'Academic year already exists'
        ];
    }
}

<?php

namespace Okotieno\StudyMaterials\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudyMaterialDocRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('upload study materials');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pdfFile' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'pdfFile.required' => 'You have not attached a pdf document',
        ];
    }
    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'You are not authorised to upload study materials'
        );
    }
}

<?php

namespace Okotieno\StudyMaterials\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudyMaterialRequest extends FormRequest
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
            'docId' => 'required',
            'title' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'docId.required' => 'Document Id is required',
            'title.required' => 'Document Id is required',
        ];
    }
    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'You are not authorised to upload study materials'
        );
    }
}

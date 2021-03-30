<?php

namespace Okotieno\ELearning\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopicOnlineAssessmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create online assessment');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'description.required' => 'Assessment Description field is required',
        ];
    }
    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'You are not authorised to Create an assessment'
        );
    }
}

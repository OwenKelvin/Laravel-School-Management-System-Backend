<?php

namespace Okotieno\ELearning\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreELearningCourseContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create e-learning course');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'e_learning_topic_id' => 'required',
            'study_material_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'e_learning_topic_id.required' => 'E Learning Topic is required',
            'study_material_id.required' => 'Study Material is required',
        ];
    }
    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'You are not authorised to Create a an E - Learning Course'
        );
    }
}

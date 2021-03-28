<?php

namespace Okotieno\LMS\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLibraryBookIssueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('issue library book');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_number' => 'required',
            'ref' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'id_number.required' => 'User School Id Number is required',
            'ref.required' => 'The book Unique Reference is required',
        ];
    }
    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'You are not authorised to issue a library book'
        );
    }
}

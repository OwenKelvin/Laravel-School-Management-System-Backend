<?php

namespace Okotieno\LMS\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLibraryBookReturnRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('mark library book returned');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ref' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'ref.required' => 'The book Unique Reference is required',
        ];
    }
    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'You are not authorised to mark a library book as returned'
        );
    }
}

<?php

namespace Okotieno\LMS\Request;

use Illuminate\Foundation\Http\FormRequest;

class StoreLibraryBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('add library book');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
//            'ref' => 'required',
            'ISBN' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The book title is required',
//            'ref.required' => 'The book Unique Reference is required',
            'ISBN.required' => 'The ISBN Number Field is required',
        ];
    }
    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'You are not authorised to add a library book'
        );
    }
}

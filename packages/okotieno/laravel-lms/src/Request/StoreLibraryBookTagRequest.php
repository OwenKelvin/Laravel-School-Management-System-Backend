<?php

namespace Okotieno\LMS\Request;

use Illuminate\Foundation\Http\FormRequest;

class StoreLibraryBookTagRequest extends FormRequest
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

            'name' => 'required|unique:library_book_tags',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The Tag name is required',
        ];
    }
    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'You are not authorised to Create a Tag'
        );
    }
}

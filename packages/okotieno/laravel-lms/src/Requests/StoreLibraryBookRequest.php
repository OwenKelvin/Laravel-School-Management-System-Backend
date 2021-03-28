<?php

namespace Okotieno\LMS\Requests;

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
            'category' => 'required',
            'ISBN' => 'required',
            'authors' => 'required',
            'book_items.*.ref' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The book title is required',
            'category.required' => 'The book Category is required',
            'ISBN.required' => 'The ISBN Number Field is required',
            'authors.required' => 'required',
        ];
    }
    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException(
            'You are not authorised to add a library book'
        );
    }
}

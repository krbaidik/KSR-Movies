<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'slug' => 'required',
            'short_description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Title field is required',
            'slug.required' => 'Slug field is required',
            'short_description.required' => 'Short description field is required',
        ];
    }
}

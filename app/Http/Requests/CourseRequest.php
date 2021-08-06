<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'course_type_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'course_image' => request()->method == 'POST' ? 'required|image' : 'nullable',
        ];
    }
}

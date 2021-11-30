<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AchievementRequest extends FormRequest
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
            'achieve_name' => 'required',
            'achieve_desc' => 'required',
            'achieve_image' => 'required|max:250|dimensions:width=500,height=281',
        ];
    }
    public function messages()
    {
        return [
            'achieve_name.required' => 'The achievement name is required.',
            'achieve_desc.required'  => 'The achievement description is required.',
            'achieve_image.required'  => 'The achievement image is required.',
            'achieve_image.max'  => 'The achievement image maximum size is 250KB.',
            'achieve_image.dimensions'  => 'The achievement image must be 500 x 281 pixels.',
        ];
    }
}

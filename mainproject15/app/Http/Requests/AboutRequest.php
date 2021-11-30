<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'about_text' => 'required|max:850',
            'vision_text' => 'required|max:140',
            'mission_text' => 'required|max:140',
            'banner_image' => 'required|max:250|dimensions:width=1600,height=400',
            'vision_mission_img' => 'required|max:250|dimensions:width=500,height=300',
            'core_value_img' => 'required|max:250|dimensions:width=500,height=300',
        ];
    }

    public function messages()
    {
        return [
            'about_text.required' => 'The about text is required.',
            'about_text.max' => 'The about text maximum value 850.',
            'vision_text.required'  => 'The vision text is required.',
            'vision_text.max'  => 'The vision text maximum value 140.',
            'mission_text.required'  => 'The mission text is required.',
            'mission_text.max'  => 'The mission text maximum value 140.',
            'banner_image.required'  => 'The banner image is required.',
            'vision_mission_img.required'  => 'The vision mission image is required.',
            'core_value_img.required'  => 'The core value image is required.',
            'banner_image.max'  => 'The banner Image maximum size is 250KB.',
            'banner_image.dimensions'  => 'The banner Image must be 1600 x 400 pixels.',
            'vision_mission_img.max'  => 'The vision mission Image maximum size is 250KB.',
            'vision_mission_img.dimensions'  => 'The vision mission Image must be 500 x 300 pixels.',
            'core_value_img.max'  => 'The core value Image maximum size is 250KB.',
            'core_value_img.dimensions'  => 'The core value Image must be 500 x 300 pixels.',
        ];
    }
}

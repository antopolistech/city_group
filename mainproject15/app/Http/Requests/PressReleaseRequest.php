<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PressReleaseRequest extends FormRequest
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
            'press_release_title' => 'required',
            'press_release_place' => 'required',
            'press_release_date' => 'required',
            'press_release_image' => 'required|max:250',
            'press_release_desc' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'press_release_title.required' => 'The press release title is required.',
            'press_release_image.required'  => 'The press release image is required.', 
            'press_release_place.required' => 'The press release place is required.',
            'press_release_date.required'  => 'The press release date is required.',
            'press_release_image.max'  => 'The press release image maximum size is 250KB.',
            'press_release_desc.required'  => 'The press release Description is required.',
        ];
    }
}

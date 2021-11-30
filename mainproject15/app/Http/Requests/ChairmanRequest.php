<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChairmanRequest extends FormRequest
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
            'chairman_name' => 'required',
            'chairman_message' => 'required',
            'chairman_designation' => 'required',
            'chairman_image' => 'required|max:250|dimensions:width=358,height=417',
        ];
    }
    public function messages()
    {
        return [
            'chairman_name.required' => 'The chairman name is required.',
            'chairman_message.required' => 'The chairman message is required.',
            'chairman_designation.required'  => 'The chairman designation is required.',
            'chairman_image.required'  => 'The chairman image is required.',
            'chairman_image.max'  => 'The chairman image maximum size is 250KB.',
            'chairman_image.dimensions'  => 'The chairman image must be 358 x 417 pixels.',
        ];
    }
}

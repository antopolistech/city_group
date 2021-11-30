<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommercialRequest extends FormRequest
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
            'commercial_iframe' => 'required',
            'commercial_text' => 'required|max:40',
        ];
    }
    public function messages()
    {
        return [
            'commercial_iframe.required' => 'The commercial iframe is required.',
            'commercial_text.required'  => 'The commercial text is required.',
            'commercial_text.max'  => 'The commercial text maximum size is 40.',
        ];
    }
}

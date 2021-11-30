<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'brand_name' => 'required',
            'brand_logo' => 'required|max:250',
            'brand_desc' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'brand_name.required' => 'The Brand name is required.',
            'brand_desc.required'  => 'The Brand Description is required.',
            'brand_logo.required'  => 'The Brand logo is required.',
            'brand_logo.max'  => 'The Brand logo maximum size is 250KB.',
        ];
    }
}

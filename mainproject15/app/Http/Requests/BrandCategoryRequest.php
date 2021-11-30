<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandCategoryRequest extends FormRequest
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
            'brand_id' => 'required',
            'category_name' => 'required',
            'precedence' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'brand_id.required' => 'The brand name is required.',
            'category_name.required'  => 'The category name is required.',
            'precedence.required'  => 'The precedence is required.',
        ];
    }
}

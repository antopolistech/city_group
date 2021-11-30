<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required',
            'product_image' => 'required|max:500|dimensions:width=246,height=320',
            'product_add' => 'max:500|dimensions:width=500,height=300',
        ];
    }

     public function messages()
    {
        return [
            'category_id.required' => 'The category name is required.',
            'product_image.required'  => 'The product image is required.',
            'product_image.max'  => 'The product image maximum size is 500KB.',
            'product_image.dimensions'  => 'The product image must be 246 x 320 pixels.',
            'product_add.max'  => 'The product image maximum size is 500KB.',
            'product_add.dimensions'  => 'The product image must be 500 x 300 pixels.',
        ];
    }
}

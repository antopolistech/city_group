<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SisterConcernRequest extends FormRequest
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
            'sister_name' => 'required',
            'started_type' => 'required',
            'sister_image' => 'required|max:250|dimensions:width=341,height=227',
            'sister_year' => 'required',
            'sister_functionality' => 'required',
        ];
    }

     public function messages()
    {
        return [
            'sister_name.required' => 'The sister and concern name is required.',
            'started_type.required'  => 'The started operation is required.',
            'sister_image.required'  => 'The sister and concern image is required.',
            'sister_year.required'  => 'The sister and concern year is required.',
            'sister_functionality.required'  => 'The sister and concern functionality is required.',
            'sister_image.max'  => 'The sister and concern image maximum size is 250KB.',
            'sister_image.dimensions'  => 'The sister and concern image must be 341 x 227 pixels.',
        ];
    }
}

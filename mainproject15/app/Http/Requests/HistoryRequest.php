<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryRequest extends FormRequest
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
            'history_name' => 'required',
            'history_year' => 'required',
            'history_image' => 'required|max:250|dimensions:width=300,height=200',
            'history_desc' => 'required',
        ];
    }

     public function messages()
    {
        return [
            'history_name.required' => 'The history name is required.',
            'history_year.required'  => 'The history year is required.',
            'history_image.required'  => 'The history image is required.',
            'history_desc.required'  => 'The history description is required.',
            'history_image.max'  => 'The history image maximum size is 250KB.',
            'history_image.dimensions'  => 'The history image must be 300 x 200 pixels.',
        ];
    }
}

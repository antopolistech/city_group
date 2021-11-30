<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectorRequest extends FormRequest
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
            'director_name' => 'required',
            'director_designation' => 'required',
            'director_image' => 'max:250',
        ];
        // |dimensions:width=358,height=417
    }
    public function messages()
    {
        return [
            'director_name.required' => 'The director name is required.',
            'director_designation.required'  => 'The director designation is required.',
            'director_image.max'  => 'The director image maximum size is 250KB.',
            // 'director_image.dimensions'  => 'The director image must be 358 x 417 pixels.',
        ];
    }
}

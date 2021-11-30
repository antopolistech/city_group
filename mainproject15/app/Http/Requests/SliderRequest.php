<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'sliderText1' => 'max:16',
            'sliderText2' => 'max:14',
            'sliderImage' => 'max:250|dimensions:min_width=1600,min_height=700',
        ];
    }

    public function messages()
    {
        return [
            'sliderImage.max'  => 'The slider Image maximum size is 250KB.',
            'sliderImage.dimensions'  => 'The slider Image must be at least 1600 x 700 pixels.',
            'sliderText1.max' => 'The slider Text1 maximum value is 16.',
            'sliderText2.max'  => 'The slider Text2 maximum value is 14.',
        ];
    }
}

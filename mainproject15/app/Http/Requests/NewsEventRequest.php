<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsEventRequest extends FormRequest
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
            'news_name' => 'required',
            'news_image' => 'required|max:250',
            'news_desc' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'news_name.required' => 'The news and event name is required.',
            'news_desc.required'  => 'The news and event description is required.',
            'news_image.required'  => 'The news and event image is required.',
            'news_image.max'  => 'The news and event image maximum size is 250KB.',
        ];
    }
}

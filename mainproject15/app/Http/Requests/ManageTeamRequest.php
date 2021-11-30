<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageTeamRequest extends FormRequest
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
            'manageTeam_name' => 'required',
            'manageTeam_image' => 'max:250',
            'manageTeam_designation' => 'required',
        ];
        // |dimensions:width=358,height=417
    }
    public function messages()
    {
        return [
            'manageTeam_name.required' => 'The management team name is required.',
            'manageTeam_designation.required'  => 'The management team designation is required.',
            'manageTeam_image.max'  => 'The management team image maximum size is 250KB.',
            // 'director_image.dimensions'  => 'The management team image must be 358 x 417 pixels.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequest extends FormRequest
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
            'designation' => 'required',
            'vacancy' => 'required',
            'job_description' => 'required',
            'job_nature' => 'required',
            'educational_req' => 'required',
            'professional_certificate' => 'required',
            'experience_req' => 'required',
            'job_req' => 'required',
            'job_location' => 'required',
            'salary_range' => 'required',
            'other_benefit' => 'required',
            'published_on' => 'required|date',
            'deadline' => 'required|date',
            'instruction' => 'required',
            'BD_job_link' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'designation.required' => 'The designation is required.',
            'vacancy.required' => 'The vacancy is required.',
            'job_description.required' => 'The job description is required.',
            'job_nature.required' => 'The job nature is required.',
            'educational_req.required' => 'The educational requirement is required.',
            'professional_certificate.required' => 'The professional certificate is required.',
            'experience_req.required' => 'The experience requirement is required.',
            'job_req.required' => 'The job requirement is required.',
            'job_location.required' => 'The job location is required.',
            'salary_range.required' => 'The salary range is required.',
            'other_benefit.required' => 'The other benefit is required.',
            'published_on.required' => 'The published on is required.',
            'deadline.required' => 'The deadline is required.',
            'instruction.required' => 'The instruction is required.',
            'BD_job_link.required' => 'The BD job link is required.',
        ];
    }
}

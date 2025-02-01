<?php

namespace App\Http\Requests\GlobalSetting\MasterSetting;

use Illuminate\Foundation\Http\FormRequest;

class CreateSchool extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'school_name' => 'required|string|max:255',
            'school_address' => 'required|string|max:255',
            'about_school' => 'nullable|string',
            'phone_no' => 'nullable|min:10|max:15',
            'email' => 'nullable|email',
            'print_certificate_school_name'=>'required|string',
            'no_of_student'=>'nullable',
            'principle_name'=>'nullable',
            'principle_mobile_no'=>'nullable',
            'principle_email'=>'nullable',
            'logo' => 'nullable|mimes:jpeg,png|max:5000',
        ];
    }
}

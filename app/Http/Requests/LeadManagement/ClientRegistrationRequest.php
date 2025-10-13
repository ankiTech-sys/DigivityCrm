<?php

namespace App\Http\Requests\LeadManagement;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRegistrationRequest extends FormRequest
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
            "client_type_id"=>['required'],
            "client_name"=>['required'],
            "company_name"=>['sometimes'],
            "email"=>["sometimes"],
            "contact_no"=>["required"],
            "address"=>['sometimes'],
            "erp_company_id"=>["sometimes"],
            "lead_source_id"=>['required'],
            "no_of_students"=>['sometimes'],
            "reg_date"=>['sometimes'],
            "erp_system"=>['sometimes'],
        ];
    }
}

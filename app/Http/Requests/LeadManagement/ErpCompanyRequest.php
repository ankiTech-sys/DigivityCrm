<?php

namespace App\Http\Requests\LeadManagement;

use Illuminate\Foundation\Http\FormRequest;

class ErpCompanyRequest extends FormRequest
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
            "company_name"=>["required"],
            "address"=>["sometimes"],
            "status"=>["required", "in:yes,no"]
        ];
    }
}

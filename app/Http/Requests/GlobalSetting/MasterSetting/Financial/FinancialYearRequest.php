<?php

namespace App\Http\Requests\GlobalSetting\MasterSetting\Financial;

use Illuminate\Foundation\Http\FormRequest;

class FinancialYearRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'financial_session' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'is_active'=>'nullable'
        ];
    }
}

<?php

namespace App\Http\Requests\InvoiceModule;

use Illuminate\Foundation\Http\FormRequest;

class SavePaymentRequest extends FormRequest
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
            'customer_id' => 'required',
            'payment_number' => 'nullable',
            'received_amount' => 'required|numeric|min:0',
            'bank_charges' => 'nullable|numeric|min:0',
            'payment_date' => 'nullable|date',
            'payMode' => 'required', // Adjust as per your pay mode options
            'reference_number' => 'nullable|string|max:255',

            // Invoices
            'invoices' => 'required|array|min:1',
            'invoices.*.date' => 'required|date',
            'invoices.*.invoice_number' => 'required|string',
            'invoices.*.received_amount' => 'nullable|numeric|min:0',

            // Expenses
            'expenses' => 'nullable|array',
            'expenses.*.name' => 'required_with:expenses.*.invoice_number|string|max:255',
            'expenses.*.invoice_number' => 'required_with:expenses.*.name|string',
            'expenses.*.quantity' => 'nullable|integer|min:1',
            'expenses.*.rate' => 'nullable|numeric|min:0',
            'expenses.*.amount' => 'nullable|numeric|min:0',
        ];
    }
}

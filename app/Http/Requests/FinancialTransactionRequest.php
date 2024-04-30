<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\FinancialCategory;

class FinancialTransactionRequest extends FormRequest
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
            'amount' =>["required", "integer"],
            'transaction_date' => ["required", "date"],
            'description' => ["nullable", "string", "max:100"],
            'financial_category_id' => ["required", "integer", 'exists:financial_categories,id'],
            'transaction_category_id' => ["required", "integer", "exists:transaction_categories,id"],
            'credit_card_id' => ["nullable", "integer", "exists:cards,id"]
        ];
    }

    public function attributes()
    {
        return [
            'financial_category_id' => 'Financial type',
            'transaction_category_id' => "Transaction category"
        ];
    }
}

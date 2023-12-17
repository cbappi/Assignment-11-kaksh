<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellStoreRequest extends FormRequest
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
            'sell_date' => 'required|date',
            'product_id' => 'required|numeric',
            'sell_qty' => 'required|numeric',
            'unit_price' => 'required|numeric',
            
        ];
    }
}

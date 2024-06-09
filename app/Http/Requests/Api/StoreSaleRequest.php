<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
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
            'customer_name' => 'required|string',
            'customer_phone' => 'required|string',
            'customer_phone_2' => 'nullable|string',
            'customer_address' => 'nullable|string',
            'customer_lat' => 'required|string',
            'customer_lng' => 'required|string',
            'customer_address_voice' => 'nullable',
            'product_id' => 'required|integer|exists:products,id',
            'date' => 'required|date_format:Y-m-d',
            'type' => 'required|integer',
        ];
    }
}

<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => 'required|array',
            'title.*' => 'string',
            'description' => 'nullable|array',
            'description.*' => 'nullable|string',
            'serial_number' => 'required|string|unique:products,serial_number',
            'quantity' => 'required|numeric',
            'cash_price' => 'required|numeric',
            'salesman_profit' => 'required|numeric',
            'status' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,svg',
        ];
    }
}

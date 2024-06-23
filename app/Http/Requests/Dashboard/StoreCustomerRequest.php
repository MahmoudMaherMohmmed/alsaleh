<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'salesman_id' => 'required|exists:clients,id',
            'name' => 'required|string',
            'phone' => 'required|string|unique:customers,phone',
            'phone_2' => 'nullable|string',
            'area_id' => 'required|exists:areas,id',
            'address' => 'required|string',
            'lat' => 'nullable|string',
            'lng' => 'nullable|string',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('customers.attributes');
    }
}

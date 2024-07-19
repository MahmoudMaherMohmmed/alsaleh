<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Warehouse;
use Illuminate\Foundation\Http\FormRequest;

class StoreCarProductRequest extends FormRequest
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
            'car_id' => 'required|integer|exists:cars,id',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|lte:' . Warehouse::where('product_id', $this->product_id)->first()->quantity,
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('car_products.attributes');
    }
}

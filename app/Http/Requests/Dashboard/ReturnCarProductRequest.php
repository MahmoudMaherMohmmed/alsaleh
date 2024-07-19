<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;

class ReturnCarProductRequest extends FormRequest
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
            'quantity' => 'required|integer|lte:' . Car::where('id', $this->car_id)->first()->products()->where('product_id', $this->product_id)->first()->pivot->quantity,
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

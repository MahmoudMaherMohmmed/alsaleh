<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'customer_area_id' => 'required|integer|exists:areas,id',
            'customer_address' => 'nullable|string',
            'customer_lat' => 'required|string',
            'customer_lng' => 'required|string',
            'customer_address_voice' => 'nullable',
            'product_id' => 'required|integer|exists:products,id',
            'date' => 'required|date_format:Y-m-d',
            'type' => 'required|integer',
            'cash_price' => 'required_if:type,==,1|numeric',
            'installments' => 'required_if:type,==,0|array',
            'installments.*' => 'required_if:type,==,0|array',
            'installments.*.due_date' => 'required_if:type,==,0|date_format:Y-m-d',
            'installments.*.value' => 'required_if:type,==,0|numeric',
            'installments.*.status' => 'required_if:type,==,0|numeric',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('sales.attributes');
    }

    /**
     * failedValidation
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return never
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => $validator->errors()], 403));
    }
}

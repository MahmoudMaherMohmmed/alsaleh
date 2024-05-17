<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'whatsapp_number' => 'required|numeric',
            'calling_number' => 'required|numeric',
            'info_email' => 'nullable|email',
            'support_email' => 'nullable|email',
            'image' => 'sometimes|mimes:jpeg,png,jpg,svg',
        ];
    }
}

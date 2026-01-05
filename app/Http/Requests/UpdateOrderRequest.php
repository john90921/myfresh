<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'postcode' => 'required|string|max:20',
            'notes' => 'nullable|string',
        ];
    }
        public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'phone.required' => 'Phone number is required.',
            'country.required' => 'Country is required.',
            'address.required' => 'Address is required.',
            'city.required' => 'City is required.',
            'postcode.required' => 'Postcode is required.',
        ];
    }
}

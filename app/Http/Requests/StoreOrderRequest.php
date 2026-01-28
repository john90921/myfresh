<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * StoreOrderRequest
 * Validates order creation data - customer delivery information
 */
class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Returns true - all authenticated users can create orders
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * Validates customer delivery and contact information
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',        // Customer name
            'phone' => 'required|string|max:20',        // Contact number
            'country' => 'required|string|max:255',     // Delivery country
            'address' => 'required|string|max:255',     // Street address
            'city' => 'required|string|max:100',        // City name
            'postcode' => 'required|string|max:20',     // Postal/ZIP code
            'note' => 'nullable|string',                // Optional delivery notes

        ];
    }

    /**
     * Custom validation error messages
     */
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

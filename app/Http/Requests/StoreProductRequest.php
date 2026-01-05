<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required',
            'package' => 'required|array|min:1',
            'package.*.name' => 'required|string|max:255',
            'package.*.price' => 'required|numeric|min:0',
            'package.*.quantity' => 'required|integer|min:0',
            'package.*.description'=>'required|string|max:255',

        ];
    }

    public function messages(): array
    {
        return [
            'package.required' => 'At least one package is required.',
            'package.*.name.required' => 'Package name is required.',
            'package.*.price.required' => 'Package price is required.',
            'package.*.quantity.required' => 'Package quantity is required.',
            'package.*.description.required' => 'Package description is required.',
        ];
    }
}

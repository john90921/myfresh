<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateproductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
 public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'sometimes|required',
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

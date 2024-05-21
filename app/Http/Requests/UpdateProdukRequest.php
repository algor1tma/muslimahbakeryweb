<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Set to true if you want to allow this request, typically this is handled with policies or other authorization logic.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'spesifikasi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048', // 2048 KB max size for image
        ];
    }
}

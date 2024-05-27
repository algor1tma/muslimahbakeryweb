<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Set to true to allow this request
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
            'harga' => 'required|string|max:50', // Assume price as a string with a max length of 50 characters
            'spesifikasi' => 'nullable|string',
            'gambar' => 'nullable|string|max:255', // Assume image as a string with a max length of 255 characters
            'kategori_id' => 'required|exists:kategoris,id'
        ];
    }
}

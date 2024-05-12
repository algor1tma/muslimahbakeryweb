<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            //
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:admins,email', // Assuming your admin table is named "admins"
            'no_telp' => 'required|string|max:20', // Assuming no_telp is a string field
            'address' => 'required|string|max:100',
            'password' => 'required|string|min:6', // You can adjust the minimum password length as needed
        ];
    }
}

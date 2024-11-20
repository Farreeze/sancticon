<?php

namespace App\Http\Requests\MainChurch;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class AddAdminRequest extends FormRequest
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
            'main_church' => 'required|in:1',
            'sub_church' => 'required|in:0',
            'user' => 'required|in:0',
            'superadmin' => 'required|in:0',
            'church_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'mobile_number' => 'required|numeric|digits:11',
            'email' => 'required|string|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ];
    }
}

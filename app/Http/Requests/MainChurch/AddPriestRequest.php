<?php

namespace App\Http\Requests\MainChurch;

use Illuminate\Foundation\Http\FormRequest;

class AddPriestRequest extends FormRequest
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
            // 'church_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'suffix_name' => 'nullable',
            'priest_title'=>'required',
            'middle_name' => 'nullable',
            'image' => 'nullable|file|image|max:2048'
        ];
    }
}

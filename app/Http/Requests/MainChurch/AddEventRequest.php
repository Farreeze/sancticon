<?php

namespace App\Http\Requests\MainChurch;

use Illuminate\Foundation\Http\FormRequest;

class AddEventRequest extends FormRequest
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
            'sacrament_id' => 'required|exists:lib_sacraments,id',
            'church_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'desc' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required|string|max:255'
        ];
    }
}

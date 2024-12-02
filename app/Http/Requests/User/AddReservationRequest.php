<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AddReservationRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'church_id' => 'required|exists:users,id',
            'sacrament_id' => 'required|exists:lib_sacraments,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'participant_name' => 'nullable|string',
            'first_name' => 'nullable|string',
            'second_name' => 'nullable|string',
            'custom_name' => 'nullable|string',
            'custom_number' => 'nullable|string',
            'file_one' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'file_two' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'file_three' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'file_four' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'subchurch_approve' => 'nullable|boolean',
            'status' => 'nullable|boolean'
        ];
    }
}

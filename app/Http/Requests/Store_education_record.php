<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store_education_record extends FormRequest
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
            'student_id'=>'required|exists:students,id',
            'university_id'=>'required|exists:universities,id',
            'specialization_id'=>'required|exists:specializations,id',
            'registration_date'=>'required|date|after_or_equal:end_date',
            'graduation_date'=>'required|date|before_or_equal:start_date',
            'status'=>'required|in:graduate,not graduated',
        ];
    }

}

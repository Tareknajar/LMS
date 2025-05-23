<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store_cretoficate extends FormRequest
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
            'track_id'=>'required|exists:tracks,id',
            'issus_date'=>'required|date',
            'student_rate'=>'required|',
            'pdf_link'=>'required|file|mimes:pdf|max:10240'
        ];
    }
}

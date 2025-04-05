<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store_electronic_courses extends FormRequest
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
            'course_id'=>'required|exists:courses,id',
            'pdf'=>'required|file|mimes:pdf|max:10240',
            'video'=>'required|file|mimes:mp4,mov,avi,webm|max:51200',
        ];
    }
}

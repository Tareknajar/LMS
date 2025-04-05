<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storecourse extends FormRequest
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
        	'course_titel'=>'required|string|max:255',
        	'lecture_titel'=>'required|string|max:255',
        	'lecture_number'=>'required|integer',
        	'lecture_date'=>'required|date',
        	'track_session_id'=>'required|exists:track_sessions,id',
        ];
    }
}

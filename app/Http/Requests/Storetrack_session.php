<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storetrack_session extends FormRequest
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
            'track_id'=>'required|exists:tracks,id',
            'batch_number'=>'required|integer',
            'date_start'=>'required|date|before_or_equal:date_end',
            'date_end'=>'required|date|after_or_equal:date_start',
        ];
    }
}

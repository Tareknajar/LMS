<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class education_record_Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid'=>$this->uuid,
            'student'=>Student_Resource::make($this->whenLoaded('student')),	
            'university'=>University_Resource::make($this->whenLoaded('university')),
            'specialization'=>Specialization_Resource::make($this->whenLoaded('specialization')),
            'registration_date'=>$this->registration_date,
            'graduation_date'=>$this->graduation_date,
            'status'=>$this->status
        ];
    }
}

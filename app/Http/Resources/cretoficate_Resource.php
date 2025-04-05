<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class cretoficate_Resource extends JsonResource
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
            'student'=>$this->student->full_name,
            'track'=>$this->track->track_name,
            'issus_date'=>$this->issus_date,
            'student_rate'=>$this->student_rate,
            'pdf_link'=>$this->pdf_link
        ];
    }
}

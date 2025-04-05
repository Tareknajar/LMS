<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class course_Resource extends JsonResource
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
        	'course_titel'=>$this-> course_titel,
        	'lecture_titel'=>$this->lecture_titel,
        	'lecture_number'=>$this->lecture_number,
        	'lecture_date'=>$this->lecture_date,
        	'track_session_id'=>$this->track_session->batch_number,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class electronic_courses_Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'lecture_titel'=>$this->course->lecture_titel,
            'pdf'=>$this->pdf,
            'video'=>$this->video,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class track_session_Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'track_id'=>$this->track->track_name,
            'batch_number'=>$this->batch_number,
            'date_start'=>$this->date_start,
            'date_end'=>$this->date_end,
        ];
    }
}

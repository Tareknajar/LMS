<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class track_Resource extends JsonResource
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
            'track_name'=>$this->track_name,
            'track_descraption'=>$this->track_descraption,
            'trainer'=>$this->trainer->first_name
        ];
    }
}

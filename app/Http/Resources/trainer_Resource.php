<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class trainer_Resource extends JsonResource
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
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'experiens_year'=>$this->experiens_year,
            'cv'=>$this->cv
        ];
    }
}

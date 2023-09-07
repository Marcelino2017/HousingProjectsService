<?php

namespace App\Http\Resources\Houses;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HouseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'number_rooms' => $this->number_rooms,
            'price' => $this->price,
            'description' => $this->description,
        ];
    }
}

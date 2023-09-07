<?php

namespace App\Http\Resources\HousingProject;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HousingProjectResource extends JsonResource
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
            'house_id' => $this->house_id,
            'user_id' => $this->user_id,
            'payment_number' => $this->payment_number,
            'user' => $this->user,
            'house' => $this->house,
        ];
    }
}

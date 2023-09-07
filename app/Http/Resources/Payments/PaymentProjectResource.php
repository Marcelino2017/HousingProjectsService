<?php

namespace App\Http\Resources\Payments;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentProjectResource extends JsonResource
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
            'housing_project_id' => $this->housing_project_id,
            'amount' => $this->amount,
            'payment_date' => $this->payment_date,
            'housing_project' => $this->housingProject,
        ];
    }
}

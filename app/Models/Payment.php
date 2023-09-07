<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'housing_project_id',
        'amount',
        'payment_date',
    ];

    public function housingProject()
    {
        return $this->belongsTo(HousingProject::class);
    }
}

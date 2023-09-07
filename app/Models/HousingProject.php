<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousingProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'amount',
        'payment_date',
    ];
}

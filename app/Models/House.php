<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number_rooms',
        'price',
        'description',
    ];

    public function housingProject()
    {
        return $this->hasOne(HousingProject::class);
    }
}

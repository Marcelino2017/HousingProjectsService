<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousingProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_id',
        'user_id',
        'payment_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function Payments()
    {
        return $this->hasMany(Payment::class);
    }
}

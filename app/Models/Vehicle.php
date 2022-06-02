<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getStatusAttribute($attribute)
    {
        return [
            0 => 'Unavailable',
            1 => 'Available'
        ][$attribute];
    }

    /**
     * Get the bookings for the vehicleS.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

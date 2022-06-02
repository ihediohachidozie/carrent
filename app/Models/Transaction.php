<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];



    /**
     * Get the bookings for the transaction.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

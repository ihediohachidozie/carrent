<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];



    /**
     * Get the transaction that owns the booking.
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    
    /**
     * Get the transaction that owns the booking.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'total_price', 'booking_price', 'city', 'state', 'district', 'feature_id', 'is_sold', 'is_deleted'
    ];

    public function feature()
    {
        return $this->hasOne(Feature::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'total_price', 'booking_price', 'city', 'state', 'district', 'area', 'bedrooms', 'kitchens', 'parking', 'type', 'user_id', 'is_sold', 'is_deleted'
    ];


    public function photos()
    {
        return $this->hasMany(Photo::class)->where('is_deleted', 0);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function userProperties()
    {
        return $this->hasMany(UserProperty::class);
    }
}

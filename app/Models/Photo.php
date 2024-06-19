<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'path_name', 'property_id', 'is_deleted', 'type'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}

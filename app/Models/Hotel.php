<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Hotel extends Model
{
    protected $fillable = [
        'ar_name',
        'en_name',
        'ar_description',
        'en_description',
        'address',
        'stars_number',
        'image'
    ];

    public function getHotelImageAttribute()
    {
        return Storage::url('public/hotels/' . $this->image);
    }
}

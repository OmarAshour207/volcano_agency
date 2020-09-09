<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Flight extends Model
{
    protected $fillable = [
        'ar_start',
        'en_start',
        'ar_destination',
        'en_destination',
        'price',
        'status',
        'image',
        'take_off',
        'take_off_time',
        'landing',
        'landing_time',
        'adults'
    ];

    public function getFlightImageAttribute()
    {
        return Storage::url('public/flights/' . $this->image);
    }
}

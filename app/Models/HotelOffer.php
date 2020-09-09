<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelOffer extends Model
{
    protected $fillable = [
        'hotel_id',
        'price',
        'check_in',
        'check_out',
        'rooms',
        'adults',
        'kids'
    ];

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel', 'hotel_id');
    }
}

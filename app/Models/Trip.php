<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Trip extends Model
{
    protected $fillable = [
        'ar_title',
        'en_title',
        'ar_description',
        'en_description',
        'ar_start',
        'en_start',
        'ar_destination',
        'en_destination',
        'start_at',
        'start_at_time',
        'end_at',
        'end_at_time',
        'price',
        'image'
    ];

    public function getTripImageAttribute()
    {
        return Storage::url('public/trips/' . $this->image);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Connection para sa database

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'service_id',
        'location',
        'booking_date',
        'booking_time',
        'end_time',
        'price',
        'user_id'
    ];

    protected $attributes = [
        'status' => 'pending',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
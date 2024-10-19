<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Make sure you define these fields
    
    public function showBookingForm()
    {
        $services = Service::all(); // Fetch all services from the database
        return view('booking_form', compact('services'));
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}


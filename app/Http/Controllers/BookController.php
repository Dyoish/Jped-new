<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;

class BookController extends Controller
{
    /**
     * Display the booking form with services.
     */
    public function showForm()
    {
        // Fetch all services to populate the dropdown
        $services = Service::all();
        return view('Book', compact('services'));
    }

    /**
     * Store a new booking.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service_id' => 'required|integer|exists:services,id', // Ensures valid service
            'booking_date' => 'required|date',
            'booking_time' => 'required',
        ]);

        // Check if a booking already exists for this user at the same date and time
        $existingBooking = Booking::where('email', $request->email)
            ->where('booking_date', $request->booking_date)
            ->where('booking_time', $request->booking_time)
            ->first();

        if ($existingBooking) {
            return redirect()->back()->with('error', 'You already have a booking for this date and time.');
        }

        // Create a new booking record
        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'service_id' => $request->service_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your booking has been successfully submitted!');
    }

    /**
     * Display all bookings (for admin or management views).
     */
    public function index()
    {
        // Fetch all bookings
        $bookings = Booking::all();
        return view('Book', compact('bookings'));
    }
}

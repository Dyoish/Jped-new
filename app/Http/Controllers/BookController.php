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
    
     public function showBookingForm()
     {
         // Fetch all services from the services table
         $services = Service::all(); 
         // Pass the $services variable to the booking_form view
         return view('booking_form', compact('services'));
     }

    /**
     * Store a new booking.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'service_id' => 'required|exists:services,id',  // Ensure the service_id exists in the services table
            'booking_date' => 'required|date',
            'booking_time' => 'required|date_format:H:i',
        ]);

        // Check if a booking already exists for this user at the same date and time
        $existingBooking = Booking::where('email', $request->email)
            ->where('booking_date', $request->booking_date)
            ->where('booking_time', $request->booking_time)
            ->first();

        if ($existingBooking) {
            return redirect()->back()->with('error', 'You already have a booking for this date and time.');
        }

        // Create a new booking
        $booking = new Booking();
        $booking->name = $validated['name'];
        $booking->email = $validated['email'];
        $booking->service_id = $validated['service_id'];
        $booking->booking_date = $validated['booking_date'];
        $booking->booking_time = $validated['booking_time'];
        $booking->save();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Your booking has been added successfully!');
    }

    public function showAllBookings()
    {
        // Fetch all bookings from the database
        $bookings = Booking::with('service')->get(); // Ensure 'service' relationship is defined
        
        // Pass the bookings to the view
        return view('bookings.index', compact('bookings'));
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

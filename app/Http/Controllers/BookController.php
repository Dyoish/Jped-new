<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth; // Import this

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

        // Check if another user has booked the same date for the same service
        $existingBooking = Booking::where('service_id', $validated['service_id'])
        ->where('booking_date', $validated['booking_date'])
        ->where('user_id', '!=', Auth::id()) // Check for bookings by other users
        ->first();

        // Check if the user has already booked the same date
        $userBooking = Booking::where('service_id', $validated['service_id'])
        ->where('booking_date', $validated['booking_date'])
        ->where('user_id', Auth::id()) // Check for bookings by the same user
        ->first();

        // If the current user has already booked the same date, return an error
        if ($userBooking) {
            return back()->withErrors(['booking_date' => 'Other Clients has already booked the same date, please choose other date.']);
        }

        // Create a new booking
        $booking = new Booking();

        $booking->name = $validated['name'];
        $booking->email = $validated['email'];
        $booking->service_id = $validated['service_id'];
        $booking->booking_date = $validated['booking_date'];
        $booking->booking_time = $validated['booking_time'];

        // Assign the user ID from the currently logged-in user
        $booking->user_id = Auth::id();

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

    public function cancel(Request $request, $id)
    {
        $booking = Booking::find($id);
    
        // Check if the booking exists
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }
    
        // Ensure the authenticated user is the owner of the booking
        if ($booking->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
    
        // Perform the cancellation (delete the booking)
        $booking->delete();
    
        return redirect()->back()->with('success', 'Booking canceled successfully.');
    }
}

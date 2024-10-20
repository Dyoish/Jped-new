<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth; // Import this

class BookController extends Controller
{
    /**
     * Display all bookings for the authenticated user.
     */
    public function index()
    {
        // Fetch all bookings for the authenticated user
        $bookings = Booking::where('user_id', Auth::id())->get(); // Filter by the logged-in user
        return view('bookings.index', compact('bookings'));
    }
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
    

    /**
     * Show all bookings for the authenticated user.
     */
    public function showAllBookings()
    {
        // Fetch all bookings for the authenticated user
        $bookings = Booking::with('service')->where('user_id', Auth::id())->get(); // Filter by the logged-in user

        // Pass the bookings to the view
        return view('bookings.index', compact('bookings'));
    }

        public function update(Request $request, $id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        // Log the request data to see what's being submitted
        \Log::info('Request Data:', $request->all());

        // Validate the input fields
        $request->validate([
            'name' => 'required', // Update this line
            'email' => 'required|email',
            'service_id' => 'required|exists:services,id', // Ensure the service exists
            'booking_date' => 'required|date',
            'booking_time' => 'required', // Ensure it matches H:i format
        ]);

        // Update the booking details
        $booking->name = $request->input('name');
        $booking->email = $request->input('email');
        $booking->service_id = $request->input('service_id');
        $booking->booking_date = $request->input('booking_date');
        $booking->booking_time = $request->input('booking_time');
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }


    public function edit($id)
{
    $booking = Booking::find($id);

    if (!$booking) {
        return redirect()->back()->with('error', 'Booking not found.');
    }

    // Fetch all services to display in the dropdown
    $services = Service::all(); // Adjust this if your Service model has a different name

    return view('bookings.edit', compact('booking', 'services'));
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Req importation
use App\Models\Service; // Service importation
use App\Models\Booking; // Booking importation
use Illuminate\Support\Facades\Auth; // Import Auth
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    //Display bookings for the authenticated user.
    public function index()
    {
        // Fetch bookings for the authenticated user
        $bookings = Booking::where('user_id', auth()->id())->get();
        return view('bookings.index', compact('bookings'));
    }

    //Display the booking form with services.
    public function showBookingForm()
    {
        // Fetch all services from the services table
        $services = Service::all();
        // Pass the $services variable to the booking_form view
        return view('booking_form', compact('services'));
    }


    //Store a new booking.
//Store a new booking.
public function store(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'service_id' => 'required|exists:services,id',
        'location' => 'required|string|max:255',
        'booking_date' => 'required|date',
        'booking_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:booking_time',
    ]);

    // Calculate price
    $servicePrices = [
        1 => 1000, // Portrait Photography
        2 => 1500, // Concert Photography
        3 => 1250, // Cosplay Photography
        4 => 1100, // Products Photography
        5 => 800,  // Companion Photography
        6 => 1300, // Model Photography
    ];

    $locationPrices = [
        'Dagupan' => 100,
        'Binmaley' => 150,
        'Lingayen' => 200,
        'Calasiao' => 125,
    ];

    // Hourly rate based on booking duration
    $bookingDurationHours = (strtotime($validatedData['end_time']) - strtotime($validatedData['booking_time'])) / 3600;
    $hourlyRates = [
        1 => 500,
        2 => 600,
        3 => 700,
        4 => 800,
        5 => 900,
        6 => 1000,
        7 => 1100,
        8 => 1200,
        9 => 1300,
        10 => 1400,
        11 => 1500,
        12 => 1600,
        13 => 1700,
        14 => 1800,
        15 => 1900,
        16 => 2000,
    ];

    $servicePrice = $servicePrices[$validatedData['service_id']];
    $locationPrice = $locationPrices[$validatedData['location']] ?? 0; // Default to 0 if location not found
    $hourlyRate = $hourlyRates[$bookingDurationHours] ?? 0; // Default to 0 if duration exceeds available rates

    // Calculate total price
    $totalPrice = $servicePrice + $locationPrice + $hourlyRate;

    // Create booking with calculated price
    $bookingData = array_merge($validatedData, [
        'price' => $totalPrice,
    'user_id' => Auth::id()]);
    Booking::create($bookingData);

    return redirect()->back()->with('success', 'Booking created successfully!');
}



    //Show all bookings for the authenticated user.
    public function showAllBookings()
    {
        // Fetch all bookings for the authenticated user
        $bookings = Booking::with('service')->where('user_id', Auth::id())->get(); // Filter by the logged-in user
        return view('bookings.index', compact('bookings')); // Pass the bookings to the view
    }

    //Update button function in website (updated output)
    public function update(Request $request, $id)
{
    $booking = Booking::find($id);
    if (!$booking) {
        return redirect()->back()->with('error', 'Booking not found.');
    }

    // Log the request data
    Log::info('Request Data:', $request->all());

    // Validate the input fields
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'service_id' => 'required|exists:services,id',
        'booking_date' => 'required|date',
        'booking_time' => 'required',
        'location' => 'required|string|max:255', // New validation for location
    ]);

    // Update booking details
    $booking->name = $request->input('name');
    $booking->email = $request->input('email');
    $booking->service_id = $request->input('service_id');
    $booking->booking_date = $request->input('booking_date');
    $booking->booking_time = $request->input('booking_time');
    $booking->location = $request->input('location'); // Set location
    $booking->save();

    return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
}

    //Update button function in website
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

    //Cancel button function in website
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

    public function checkBooking(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'booking_date' => 'required|date',
            'service_id' => 'required|integer',
            'booking_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:booking_time',
        ]);
    
        // Check for existing bookings
        $existingBooking = Booking::where('booking_date', $request->booking_date)
            ->where('service_id', $request->service_id)
            ->where(function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('booking_time', '<=', $request->end_time)
                      ->where('end_time', '>=', $request->booking_time);
                });
            })
            ->exists();
    
        // Return JSON response
        return response()->json(['canBook' => !$existingBooking]);
    }
}

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

        $existingBooking = Booking::where('booking_date', $validatedData['booking_date'])
            ->where(function ($query) use ($validatedData) {
                $query->where(function ($q) use ($validatedData) {
                    $q->where('booking_time', '<', $validatedData['end_time'])
                        ->where('end_time', '>', $validatedData['booking_time']);
                });
            })
            ->exists();

        if ($existingBooking) {
            return response()->json(['canBook' => false, 'message' => 'Booking time is already taken. Please choose a different time.'], 409);
        }
        $servicePrices = [
            1 => 1000,
            2 => 1500,
            3 => 1250,
            4 => 1100,
            5 => 800,
            6 => 1300,
        ];

        $locationPrices = [
            'Dagupan' => 100,
            'Binmaley' => 150,
            'Lingayen' => 200,
            'Calasiao' => 125,
        ];

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
        $locationPrice = $locationPrices[$validatedData['location']] ?? 0;
        $hourlyRate = $hourlyRates[$bookingDurationHours] ?? 0;

        $totalPrice = $servicePrice + $locationPrice + $hourlyRate;

        $bookingData = array_merge($validatedData, [
            'price' => $totalPrice,
            'user_id' => Auth::id()
        ]);
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

        // Validate input fields
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date',
            'booking_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:booking_time',
            'location' => 'required|string|max:255'
        ]);

        // Pricing arrays and calculations
        $servicePrices = [1 => 1000, 2 => 1500, 3 => 1250, 4 => 1100, 5 => 800, 6 => 1300];
        $locationPrices = ['Dagupan' => 100, 'Binmaley' => 150, 'Lingayen' => 200, 'Calasiao' => 125];
        $bookingDurationHours = (strtotime($validatedData['end_time']) - strtotime($validatedData['booking_time'])) / 3600;
        $hourlyRates = [1 => 500, 2 => 600, /* include all hourly rates up to 16 hours */];

        $servicePrice = $servicePrices[$validatedData['service_id']] ?? 0;
        $locationPrice = $locationPrices[$validatedData['location']] ?? 0;
        $hourlyRate = $hourlyRates[$bookingDurationHours] ?? 0;

        $totalPrice = $servicePrice + $locationPrice + $hourlyRate;

        // Update booking details
        $booking->name = $validatedData['name'];
        $booking->email = $validatedData['email'];
        $booking->service_id = $validatedData['service_id'];
        $booking->booking_date = $validatedData['booking_date'];
        $booking->booking_time = $validatedData['booking_time'];
        $booking->end_time = $validatedData['end_time'];
        $booking->location = $validatedData['location'];
        $booking->price = $totalPrice;
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

        $services = Service::all();
        $locations = ['Dagupan', 'Binmaley', 'Lingayen', 'Calasiao']; // Define available locations

        return view('bookings.edit', compact('booking', 'services', 'locations'));
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
        $bookingDate = $request->input('booking_date');
        $bookingTime = $request->input('booking_time');
        $endTime = $request->input('end_time');
        $serviceId = $request->input('service_id');

        $exists = Booking::where('booking_date', $bookingDate)
            ->where('service_id', $serviceId)
            ->where(function ($query) use ($bookingTime, $endTime) {
                $query->whereBetween('booking_time', [$bookingTime, $endTime])
                    ->orWhereBetween('end_time', [$bookingTime, $endTime]);
            })
            ->exists();

        return response()->json(['canBook' => !$exists]);
    }
}

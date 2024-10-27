<?php

namespace App\Http\Controllers;

use App\Models\BoughtProducts;
use App\Models\CancelledProducts;
use App\Models\Products;
use App\Models\RefundedProducts;
use App\Models\User;
use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\BookingStatusMail;
use Illuminate\Support\Facades\Mail;

use Laracsv\Export; // Export para kay kay ma'am Veron

//ADMIN FUNCTIONS

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('DashBoard');
    }

    public function index()
    {
        return view('DashBoard');
    }

    public function signup()
    {
        return view('Signup');
    }

    public function adminlogin()
    {
        return view('Adminlogin');
    }

    //BOX COUNTER / STATISTICS
    public function admindashboard()
    {
        $user = User::orderBy('id', 'desc')->get();
        $usercount = User::count();
        $portraitBookingsCount = Booking::where('service_id', 1)->where('status', 'approved')->count();
        $concertBookingsCount = Booking::where('service_id', 2)->where('status', 'approved')->count();
        $cosplayBookingsCount = Booking::where('service_id', 3)->where('status', 'approved')->count();
        $productBookingsCount = Booking::where('service_id', 4)->where('status', 'approved')->count();
        $companionBookingsCount = Booking::where('service_id', 5)->where('status', 'approved')->count();
        $modelBookingsCount = Booking::where('service_id', 6)->where('status', 'approved')->count();

        return view('Admindashboards', compact('user', 'usercount', 'portraitBookingsCount', 'concertBookingsCount', 'cosplayBookingsCount', 'productBookingsCount', 'companionBookingsCount', 'modelBookingsCount'));
    }

    //TABLE
    public function adminbookings()
    {
        $bookings = Booking::with('service')->get();
        return view('adminbookings', compact('bookings'));
    }

    //customer count
    public function admincustomers()
    {
        $user = User::get();
        return view('Admincustomers', compact('user'));
    }

    //pang export
    public function exportBookings()
    {
        // Fetch all the bookings data
        $bookings = Booking::all();

        // Create a new instance of Laracsv Export class
        $csvExporter = new Export();

        // Define the columns you want to export
        $csvExporter->build($bookings, [
            'id', // It's usually good practice to include the ID for reference
            'name',
            'email',
            'service_id',
            'booking_date',
            'location' // Include location if it is needed
        ])->download('bookings.csv'); // Specify the filename for download
    }

    //Admin Authentication
    public function adminAuth(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            if ($user->id == '1') {
                return redirect()->route('admindashboards');
            } else {
                return redirect()->back()->with('error', 'Unauthorized ');
            }
        }
        return redirect()->back()->with('error', 'Unauthorized');
    }

    // Show pending bookings
    public function pendingBookings()
    {
        $bookings = Booking::where('status', 'pending')->get(); // Get all pending bookings
        return view('adminbookings', compact('bookings'));
    }

    // Approve booking
    public function approve($id)
    {
        // Find the booking by ID
        $booking = Booking::find($id);

        // Check if booking exists and is pending
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        if ($booking->status !== 'pending') {
            return redirect()->back()->with('error', 'Booking is not pending.');
        }

        // Change status to approved
        $booking->status = 'approved';
        $booking->save();

        // Send email notification
        if ($booking->email) {
            try {
                Mail::to($booking->email)->send(new BookingStatusMail($booking, 'Your booking has been approved.'));
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to send email: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Booking approved successfully!');
    }

    // Reject booking
    public function reject($id)
    {
        // Find the booking by ID
        $booking = Booking::find($id);

        // Check if booking exists
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        // Change status to rejected
        $booking->status = 'rejected';
        $booking->save();

        // Send email notification
        if ($booking->email) {
            try {
                Mail::to($booking->email)->send(new BookingStatusMail($booking, 'Your booking has been rejected.'));
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to send email: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Booking rejected successfully!');
    }
}




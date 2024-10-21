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


class DashboardController extends Controller
{
    public function dashboard(){
        return view('DashBoard');
    }

    public function index(){    
        return view('DashBoard');
    }
    
    public function signup(){
        return view('Signup');
    }

    public function terms(){
        return view('terms');
    }
    
    public function adminlogin(){
        return view('Adminlogin');
    }

    public function admindashboard(){
        $user = User::orderBy('id','desc')->get();
        $usercount = User::count();
        return view('Admindashboards',compact('user','usercount'));
    }

    public function adminanalytics(){
        $bookings = Booking::with('service')->get(); 
        return view('adminanalytics', compact('bookings'));
    }
    
    //customer count
    public function admincustomers(){
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

        // Build the CSV with the selected columns and then download
        $csvExporter->build($bookings, [
        'name',
        'email',
        'service_id',
        'booking_date',
        'booking_time',])->download();
    }
    
    //Admin Authentication
    public function adminAuth(Request $request) {

        $request->validate([
            'email'    => 'required',
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
        return view('adminanalytics', compact('bookings'));
    }

    //Approve booking
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
            Mail::to($booking->email)->send(new BookingStatusMail($booking, 'approved'));
        }
    
        return redirect()->back()->with('success', 'Booking approved successfully!');
    }
    
    public function cancel($id)
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
            Mail::to($booking->email)->send(new BookingStatusMail($booking, 'rejected'));
        }
    
        return redirect()->back()->with('success', 'Booking rejected successfully!');
    }
        }

    

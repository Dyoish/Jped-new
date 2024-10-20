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

        // Ensure booking exists and status is pending
        if ($booking && $booking->status === 'pending') {
            // Change status to approved
            $booking->status = 'approved';
            $booking->save();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Booking approved successfully!');
        }

        // If booking doesn't exist or is not pending
        return redirect()->back()->with('error', 'Booking cannot be approved.');
    }
    //Reject/Cancel booking
    public function cancel($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->status = 'Rejected';
            $booking->save();
        }
        return redirect()->back()->with('success', 'Booking reject successfully!');
    }
    
}

    

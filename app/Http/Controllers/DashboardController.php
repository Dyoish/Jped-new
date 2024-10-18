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
use Laracsv\Export; // Ensure this line is added to import the correct Export class

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


    

    // public function details($id){
    //     $product = Products::find($id);
    //     return view('Product_demo',compact('product'));
    // }
    public function admindashboard(){
        $user = User::orderBy('id','desc')->get();
        $usercount = User::count();
        // $products = Products::count();
        $boughtTotal=0;
        return view('Admindashboards',compact('user','usercount','boughtTotal'));
    }
    public function adminanalytics(){
        $bookings = Booking::with('service')->get(); 
        return view('adminanalytics', compact('bookings'));
    }

    public function exportBookings()
    {
        // Fetch all the bookings data
        $bookings = Booking::all();

        // Create a new instance of Laracsv Export class
        $csvExporter = new Export();

        // Build the CSV with the selected columns and then download
        $csvExporter->build($bookings, ['name',
        'email',
        'service_id',
        'booking_date',
        'booking_time',])->download();
    }
        //COMMENT KO LANG TO FOR CHECKING PURPOSES
    //     $products = Products::count();
    //     //bought
    //     $boughtquant = BoughtProducts::sum('quantity');
    //     $boughtcount = BoughtProducts::count();
    //     $bought = BoughtProducts::all();
    //     $boughtTotal=0;
    //     foreach($bought as $boughts){
    //         $boughtTotal += $boughts -> quantity * $boughts -> price;
    //     }
    //     $refunded = RefundedProducts::sum('quantity');
    //     $cancelled = CancelledProducts::sum('quantity');
    //     //gpu
    //     $GPUquant = BoughtProducts::where("category","GPU")->sum('quantity');
    //     $GPUCount = BoughtProducts::where("category","GPU",)->count();
    //     $GPU = BoughtProducts::all()->where("category","GPU");
    //     $GPUTotal=0;
    //     foreach($GPU as $GPUs){
    //         $GPUTotal += $GPUs -> quantity * $GPUs -> price;
    //     }
    //     //mobo
    //     $Motherboardquant = BoughtProducts::where("category","Motherboard")->sum('quantity');
    //     $MotherboardCount = BoughtProducts::where("category","Motherboard",)->count();
    //     $Motherboard = BoughtProducts::all()->where("category","Motherboard");
    //     $MotherboardTotal=0;
    //     foreach($Motherboard as $Motherboards){
    //         $MotherboardTotal += $Motherboards -> quantity * $Motherboards -> price;
    //     }
    //     //ram
    //     $RAMquant = BoughtProducts::where("category","RAM")->sum('quantity');
    //     $RAMCount = BoughtProducts::where("category","RAM",)->count();
    //     $RAM = BoughtProducts::all()->where("category","RAM");
    //     $RAMTotal=0;
    //     foreach($RAM as $RAMs){
    //         $RAMTotal += $RAMs -> quantity * $RAMs -> price;
    //     }
    //     //cpu
    //     $CPUquant = BoughtProducts::where("category","CPU")->sum('quantity');
    //     $CPUCount = BoughtProducts::where("category","CPU",)->count();
    //     $CPU = BoughtProducts::all()->where("category","CPU");
    //     $CPUTotal=0;
    //     foreach($CPU as $CPUs){
    //         $CPUTotal += $CPUs -> quantity * $CPUs -> price;
    //     }
    //     //psu
    //     $PSUquant = BoughtProducts::where("category","PSU")->sum('quantity');
    //     $PSUCount = BoughtProducts::where("category","PSU",)->count();
    //     $PSU = BoughtProducts::all()->where("category","PSU");
    //     $PSUTotal=0;
    //     foreach($PSU as $PSUs){
    //         $PSUTotal += $PSUs -> quantity * $PSUs -> price;
    //     }
    //     //storage
    //     $Storagequant = BoughtProducts::where("category","Storage")->sum('quantity');
    //     $StorageCount = BoughtProducts::where("category","Storage",)->count();
    //     $Storage = BoughtProducts::all()->where("category","Storage");
    //     $StorageTotal=0;
    //     foreach($Storage as $Storages){
    //         $StorageTotal += $Storages -> quantity * $Storages -> price;
    //     }
    //     //case
    //     $Casequant = BoughtProducts::where("category","Case")->sum('quantity');
    //     $CaseCount = BoughtProducts::where("category","Case",)->count();
    //     $Case = BoughtProducts::all()->where("category","Case");
    //     $CaseTotal=0;
    //     foreach($Case as $Cases){
    //         $CaseTotal += $Cases -> quantity * $Cases -> price;
    //     }
    //     return view('Adminanalytics', compact('GPUquant','GPUTotal','GPUCount','CPUquant','CPUTotal','Motherboardquant',
    //     'MotherboardTotal','PSUquant','PSUTotal','Storagequant','StorageTotal','Casequant','CaseTotal','RAMquant','RAMTotal','user',
    //     'MotherboardCount','RAMCount','CPUCount','PSUCount','StorageCount','CaseCount','bought','refunded','cancelled','products','boughtTotal','boughtcount','boughtquant'));
    
    public function admincustomers(){
        $user = User::get();
        return view('Admincustomers', compact('user'));
    }
    public function adminmanagement(){
        return view('Adminmanagements');
    }
    public function adminlogin(){
        return view('Adminlogin');
    }
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

    // // Confirm a booking
    // public function confirmBooking($id)
    // {
    //     $booking = Booking::find($id);
        
    //     if ($booking) {
    //         $booking->status = 'confirmed'; // Update status to confirmed
    //         $booking->save();
            
    //         return redirect()->route('dashboard.bookings.pending')->with('success', 'Booking confirmed successfully!');
    //     }

    //     return redirect()->route('dashboard.bookings.pending')->with('error', 'Booking not found.');
    // }

    // // Reject a booking
    // public function rejectBooking($id)
    // {
    //     $booking = Booking::find($id);
        
    //     if ($booking) {
    //         $booking->status = 'rejected'; // Update status to rejected
    //         $booking->save();
            
    //         return redirect()->route('dashboard.bookings.pending')->with('success', 'Booking rejected successfully!');
    //     }

    //     return redirect()->route('dashboard.bookings.pending')->with('error', 'Booking not found.');
    // }

        public function approveBooking($id)
    {
        // Find the booking by ID
        $booking = Booking::findOrFail($id);

        // Update the booking status to 'approved'
        $booking->status = 'approved';
        $booking->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Booking approved successfully.');
    }

    public function rejectBooking($id)
    {
        // Find the booking by ID
        $booking = Booking::findOrFail($id);

        // Update the booking status to 'rejected'
        $booking->status = 'rejected';
        $booking->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Booking rejected successfully.');
    }

    
}

    

<?php

namespace App\Http\Controllers;

use App\Models\BoughtProducts;
use App\Models\CancelledProducts;
use App\Models\RefundedProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profile_Controller extends Controller
{
    public function New_Password_Route(){
        return view('Profile.Change_Password');
    }

    public function New_Email_Route(){
        return view('Profile.Change_Email');
    }

    public function Profile_Route(){
        return view('Profile.User_Profile');
    }

    public function Pass_Verification_Route(){
        return view('Profile.Change_Password_Verification');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\BoughtProducts;
use App\Models\CancelledProducts;
use App\Models\RefundedProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profile_Controller extends Controller
{
    public function Profile_Route()
    {
        return view('Profile.User_Profile');
    }
}

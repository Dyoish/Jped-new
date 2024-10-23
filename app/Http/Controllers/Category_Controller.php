<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class Category_Controller extends Controller
{
    public function Portrait_Category_Route()
    {
        return view('Categories.Portrait', );
    }

    public function Concert_Category_Route()
    {
        return view('Categories.Concert');
    }

    public function Cosplay_Category_Route()
    {
        return view('Categories.Cosplay');
    }

    public function Products_Category_Route()
    {
        return view('Categories.Products');
    }

    public function Companion_Category_Route()
    {
        return view('Categories.Companion');
    }

    public function Model_Category_Route()
    {
        return view('Categories.Model');
    }

}

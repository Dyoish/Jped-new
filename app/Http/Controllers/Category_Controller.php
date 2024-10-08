<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class Category_Controller extends Controller
{
    public function Events_Category_Route(){
        $Events = Products::where("category","Events")->get();
        return view('Categories.Events',compact('Events'));
    }

    public function Ram_Category_Route(){
        $RAM = Products::where("category","RAM")->get();
        return view('Categories.Ram',compact('RAM'));
    }

    public function SSD_Category_Route(){
        $Storage = Products::where("category","Storage")->get();
        return view('Categories.SSD',compact('Storage'));
    }

    public function Gpu_Category_Route(){
        $GPU = Products::where("category","GPU")->get();
        return view('Categories.Gpu',compact('GPU'));
    }

    public function HDD_Category_Route(){
        return view('Categories.HDD');
    }

    public function PSU_Category_Route(){
        $PSU = Products::where("category","PSU")->get();
        return view('Categories.PSU',compact('PSU'));
    }

    public function Portrait_Category_Route(){
        $Portrait = Products::where("category","Portrait")->get();
        return view('Categories.Portrait',compact('Portrait'));
    }

    public function Monitor_Category_Route(){
        return view('Categories.Monitor');
    }

    public function Motherboard_Category_Route(){
        $Motherboard = Products::where("category","Motherboard")->get();
        return view('Categories.Motherboard',compact('Motherboard'));
    }

    public function PreBuilt_Category_Route(){
        return view('Categories.Pre-Built');
    }
}

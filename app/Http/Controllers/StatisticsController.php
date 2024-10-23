<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    // Method to show the statistics page
    public function index()
    {
        // Fetch any necessary data for the statistics page
        // For example: $statistics = SomeModel::getStatistics();

        // Pass the data to the statistics view (if needed)
        return view('adminstatistics'); // Assuming 'statistics.blade.php' is in 'resources/views/admin/'
    }
}
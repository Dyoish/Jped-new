<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Schema;

class BookingsExport
{
    /**
     * Export bookings as CSV.
     *
     * @return Response
     */
    public function export()
    {
        // Get all bookings
        $bookings = Booking::all();

        // Define the  headers
        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=bookings.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        // Create a callback to generate CSV
        $callback = function () use ($bookings) {
            $file = fopen('php://output', 'w');

            // Get column names from the bookings table
            $columns = Schema::getColumnListing('bookings');

            // Write the CSV header
            fputcsv($file, $columns);

            // Write each booking row to the CSV
            foreach ($bookings as $booking) {
                fputcsv($file, $booking->toArray());
            }

            fclose($file);
        };

        // Return the CSV as a streamed response
        return response()->stream($callback, 200, $headers);
    }
}

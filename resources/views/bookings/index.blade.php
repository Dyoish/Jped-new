@extends('layouts.app') <!-- Assuming you have a base layout file -->

<!-- Navigation Bar -->
@include('Layouts.navbar')

    <style>
        /* Styling the table */
        .table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
        }

        .table thead {
            background-color: #007bff;
            color: white;
        }

        .table thead th {
            padding: 10px;
            text-align: left;
        }

        .table tbody td {
            padding: 10px;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
        }

        /* Alert message */
        .alert {
            margin-top: 20px;
        }

        /* Container styling */
        .container {
            margin-top: 40px;
        }

        /* Heading styling */
        h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }
    </style>

@section('content')
<div class="container">
    <h1>All Bookings</h1>
    
    @if ($bookings->isEmpty())
        <div class="alert alert-warning" role="alert">
            No bookings found.
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Service</th>
                    <th>Booking Date</th>
                    <th>Booking Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->service->name }}</td> <!-- Assuming a relationship between booking and service -->
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ $booking->booking_time }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

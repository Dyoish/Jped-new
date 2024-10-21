<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 100px;
            padding: 20px;
        }

        h1 {
            font-size: 2.5rem;
            color: #555;
            margin-bottom: 30px;
            text-align: center;
        }

        .card {
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
            color: #777;
        }

        .footer-approved {
            background-color: #28a745;
            color: white;
        }

        .footer-pending {
            background-color: #ffc107;
            color: white;
        }

        .footer-rejected {
            background-color: #dc3545;
            color: white;
        }

        .card-footer {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            border-top: none;
            border-radius: 0 0 12px 12px;
            font-weight: bold;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @include('Layouts.navbar')

    @section('content')
    <div class="container">
        <h1>All Bookings</h1>

        @if ($bookings->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                No bookings found.
            </div>
        @else
            @foreach($bookings as $booking)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $booking->name }}</h5>
                        <p class="card-text">
                            <strong>Email:</strong> {{ $booking->email }}<br>
                            <strong>Service:</strong> {{ $booking->service->name }}<br>
                            <strong>Booking Date:</strong> {{ $booking->booking_date }}<br>
                            <strong>Booking Time:</strong> {{ $booking->booking_time }}<br>
                            <strong>Status:</strong> {{ ucfirst($booking->status) }}
                        </p>
                    </div>

                    <!-- Card Footer with Dynamic Status-Based Color -->
                    <div 
                        class="card-footer 
                        {{ trim(strtolower($booking->status)) === 'approved' ? 'footer-approved' : '' }}
                        {{ trim(strtolower($booking->status)) === 'pending' ? 'footer-pending' : '' }}
                        {{ trim(strtolower($booking->status)) === 'rejected' ? 'footer-rejected' : '' }}">
                        
                        @if (trim(strtolower($booking->status)) === 'approved')
                            Accepted
                        @elseif (trim(strtolower($booking->status)) === 'pending')
                            Pending
                        @elseif (trim(strtolower($booking->status)) === 'rejected')
                            Rejected
                        @else
                            Unknown Status
                        @endif
                    </div>
                </div>

                <!-- Modal for Approved or Rejected Bookings -->
                @if ($booking->status !== 'pending')
                    <div class="modal fade" id="seeMoreModal{{ $booking->id }}" tabindex="-1" aria-labelledby="seeMoreModalLabel{{ $booking->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="seeMoreModalLabel{{ $booking->id }}">Booking Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Name:</strong> {{ $booking->name }}</p>
                                    <p><strong>Email:</strong> {{ $booking->email }}</p>
                                    <p><strong>Service:</strong> {{ $booking->service->name }}</p>
                                    <p><strong>Booking Date:</strong> {{ $booking->booking_date }}</p>
                                    <p><strong>Booking Time:</strong> {{ $booking->booking_time }}</p>
                                    <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>

    <script>
        function confirmCancel() {
            return confirm('Are you sure you want to cancel this booking? This action cannot be undone.');
        }
    </script>

    @endsection
</body>
</html>

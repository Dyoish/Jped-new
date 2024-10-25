<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J.PED | Book Info</title>

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Load Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        .container {
            margin-top: 80px;
            padding: 20px;
        }

        h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        .card {
            margin-bottom: 24px;
            border-radius: 12px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            cursor: pointer;
            height: auto;
            min-height: 200px;
        }

        .card:hover {
            transform: scale(1.01);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.12);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .card-text {
            font-size: 0.95rem;
            color: #555;
            line-height: 1.5;
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
            padding: 8px;
            border-top: none;
            border-radius: 0 0 12px 12px;
            font-weight: bold;
            font-size: 1rem;
        }

        .modal-body p {
            margin-bottom: 8px;
            font-size: 1rem;
            color: #333;
        }

        .navbar {
            transition: top 0.3s ease-in-out;
            z-index: 1000;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .col-md-4 {
                margin-bottom: 15px;
            }
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @include('Layouts.navbar')

    @section('content')
    <div class="container">
        <h1>Your Bookings</h1>

        @if ($bookings->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                No bookings found.
            </div>
        @else
            <div class="row">
                @foreach($bookings as $booking)
                    <div class="col-md-6 col-lg-4"> <!-- Responsive column sizes -->
                        <!-- Card trigger modal -->
                        <div class="card" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $booking->id }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $booking->name }}</h5>
                                <p class="card-text">
                                    <strong>Email:</strong> {{ $booking->email }}<br>
                                    <strong>Service:</strong> {{ $booking->service->name }}<br>
                                    <strong>Location:</strong> {{ $booking->location }}<br>
                                    <strong>Booking Date:</strong> {{ $booking->booking_date }}<br>
                                    <strong>Start Time:</strong> {{ $booking->booking_time }}<br>
                                    <strong>End Time:</strong> {{ $booking->end_time }}<br>
                                    <strong>Price:</strong> {{ $booking->price }}<br>
                                    <strong>Status:</strong> {{ ucfirst($booking->status) }}
                                </p>
                            </div>

                            <div
                                class="card-footer 
                                                {{ trim(strtolower($booking->status)) === 'approved' ? 'footer-approved' : '' }}
                                                {{ trim(strtolower($booking->status)) === 'pending' ? 'footer-pending' : '' }}
                                                {{ trim(strtolower($booking->status)) === 'rejected' ? 'footer-rejected' : '' }}">
                                {{ ucfirst($booking->status) }}
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="bookingModal{{ $booking->id }}" tabindex="-1"
                            aria-labelledby="bookingModalLabel{{ $booking->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="bookingModalLabel{{ $booking->id }}">Booking Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Name:</strong> {{ $booking->name }}</p>
                                        <p><strong>Email:</strong> {{ $booking->email }}</p>
                                        <p><strong>Service:</strong> {{ $booking->service ? $booking->service->name : 'N/A' }}
                                        </p>
                                        <p><strong>Location:</strong> {{ $booking->location }}</p>
                                        <p><strong>Booking Date:</strong> {{ $booking->booking_date }}</p>
                                        <p><strong>Start Time:</strong> {{ $booking->booking_time }}</p>
                                        <p><strong>End Time:</strong> {{ $booking->end_time }}</p>
                                        <p><strong>Price:</strong> {{ $booking->price }}</p>
                                        <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <!-- Only show Edit button if status is "pending" -->
                                        @if ($booking->status === 'pending')
                                            <a href="/bookings/{{ $booking->id }}/edit" class="btn btn-primary">Edit</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        let lastScrollTop = 0;
        const navbar = document.querySelector('.navbar');

        window.addEventListener('scroll', function () {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                navbar.style.top = "-80px";
            } else {
                navbar.style.top = "0";
            }
            lastScrollTop = scrollTop;
        });
    </script>

    @endsection
</body>

</html>
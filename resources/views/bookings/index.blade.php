@extends('layouts.app') <!-- Assuming you have a base layout file -->

<!-- Navigation Bar -->
@include('Layouts.navbar')

<style>
    /* Container styling */
    .container {
        margin-top: 40px;
    }

    /* Card styling */
    .card {
        margin-bottom: 20px; /* Space between cards */
        text-align: center; /* Center content in cards */
    }

    /* Heading styling */
    h1 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
        text-align: center; /* Center the main heading */
    }

    /* Alert message */
    .alert {
        margin-top: 20px;
        text-align: center; /* Center alert messages */
    }

    /* Button styling */
    .btn {
        margin: 5px; /* Space between buttons */
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
        @foreach($bookings as $booking)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $booking->name }}</h5>
                    <p class="card-text">
                        <strong>Email:</strong> {{ $booking->email }}<br>
                        <strong>Service:</strong> {{ $booking->service->name }}<br>
                        <strong>Booking Date:</strong> {{ $booking->booking_date }}<br>
                        <strong>Booking Time:</strong> {{ $booking->booking_time }}
                    </p>
                </div>
                <div class="card-footer">
                    @if (Auth::check() && Auth::user()->id == $booking->user_id)
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary">Update</a>
                        <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST" onsubmit="return confirmCancel()">
                            @csrf
                            <!-- Remove @method('DELETE') -->
                            <button type="submit" class="btn btn-danger">Cancel Booking</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
</div>

<script>
    function confirmCancel() {
        return confirm('Are you sure you want to cancel this booking? This action cannot be undone.');
    }
</script>

@endsection

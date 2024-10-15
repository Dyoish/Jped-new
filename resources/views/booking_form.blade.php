<!DOCTYPE html>
<html>
<head>
    <title>Photography Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>

    <!-- Navigation Bar -->
    @include('Layouts.navbar')

    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container mt-5">
        <h2>Book a Photography Session</h2>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('add_booking') }}" method="POST">
    @csrf 
    <div class="mb-3">
        <label for="name" class="form-label">Your Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Your Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>

    <div class="mb-3">
    <label for="service_id" class="form-label">Select Service</label>
        <select name="service_id" class="form-select" required>
            <option value="">Choose a service...</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="booking_date" class="form-label">Select Date</label>
        <input type="text" class="form-control" id="booking_date" name="booking_date" required>
    </div>

    <div class="mb-3">
        <label for="booking_time" class="form-label">Select Time</label>
        <input type="time" class="form-control" name="booking_time" required>
    </div>

    <button type="submit" class="btn btn-primary">Book Now</button>
</form>
    </div>

    <script>
        $(function() {
            // Set the minimum date to today to disable past dates
            $("#booking_date").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0 // Prevents selecting any date before today
            });
        });
    </script>
</body>
</html>

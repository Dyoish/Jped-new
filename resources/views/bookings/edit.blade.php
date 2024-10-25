<!DOCTYPE html>
<html>

<head>
    <title>J.PED | Edit Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>

    <!-- Navigation Bar -->
    @include('Layouts.navbar')

    <br><br><br><br><br>

    <div class="container mt-5">
        <h2>Edit Your Booking</h2>

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

        <form action="{{ route('bookings.update', $booking->id) }}" method="POST" id="bookingForm">
            @csrf
            @method('POST') <!-- Use PUT if you're following RESTful conventions -->

            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $booking->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" id="email" class="form-control" name="email"
                    value="{{ old('email', $booking->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="service_id" class="form-label">Select Service</label>
                <select name="service_id" class="form-select" required>
                    <option value="">Choose a service...</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ $service->id == $booking->service_id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Select Location</label>
                <select name="location" id="location" class="form-select" required>
                    <option value="">Choose a location...</option>
                    <option value="Dagupan" {{ $booking->location == 'Dagupan' ? 'selected' : '' }}>Dagupan</option>
                    <option value="Binmaley" {{ $booking->location == 'Binmaley' ? 'selected' : '' }}>Binmaley</option>
                    <option value="Lingayen" {{ $booking->location == 'Lingayen' ? 'selected' : '' }}>Lingayen</option>
                    <option value="Calasiao" {{ $booking->location == 'Calasiao' ? 'selected' : '' }}>Calasiao</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="booking_date" class="form-label">Select Date</label>
                <input type="text" class="form-control" id="booking_date" name="booking_date"
                    value="{{ old('booking_date', $booking->booking_date) }}" required>
            </div>

            <div class="mb-3">
                <label for="booking_time" class="form-label">Select Start Time</label>
                <select name="booking_time" id="booking_time" class="form-select" required>
                    <option value="">Choose a start time...</option>
                    @for($i = 6; $i <= 22; $i++)
                        <option value="{{ sprintf('%02d:00', $i) }}" {{ $booking->booking_time == sprintf('%02d:00', $i) ? 'selected' : '' }}>
                            {{ sprintf('%d:00 %s', $i > 12 ? $i - 12 : $i, $i < 12 ? 'AM' : 'PM') }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="end_time" class="form-label">Select End Time</label>
                <select name="end_time" id="end_time" class="form-select" required>
                    <option value="">Choose an end time...</option>
                    @for($i = 6; $i <= 22; $i++)
                        <option value="{{ sprintf('%02d:00', $i) }}" {{ $booking->end_time == sprintf('%02d:00', $i) ? 'selected' : '' }}>
                            {{ sprintf('%d:00 %s', $i > 12 ? $i - 12 : $i, $i < 12 ? 'AM' : 'PM') }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Total Price</label>
                <input type="text" id="price" class="form-control" name="total_price"
                    value="{{ old('total_price', $booking->total_price) }}" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Update Booking</button>
        </form>
    </div>

    <script>
        $(function () {
            // Initialize date picker
            flatpickr("#booking_date", {
                dateFormat: "Y-m-d",
                minDate: "today",
                defaultDate: "today",
            });

            // Bind change event to calculate price
            const calculatePrice = () => {
                const serviceSelect = document.querySelector('select[name="service_id"]');
                const serviceId = serviceSelect.value;

                const locationSelect = document.querySelector('select[name="location"]');
                const locationId = locationSelect.value;

                const startTimeSelect = document.querySelector('select[name="booking_time"]');
                const startTime = startTimeSelect.value;

                const endTimeSelect = document.querySelector('select[name="end_time"]');
                const endTime = endTimeSelect.value;

                // Price definitions
                const servicePrices = {
                    "1": 1000,  // Portrait Photography
                    "2": 1500,  // Concert Photography
                    "3": 1250,  // Cosplay Photography
                    "4": 1100,  // Products Photography
                    "5": 800,    // Companion Photography
                    "6": 1300    // Model Photography
                };

                const locationPrices = {
                    "Dagupan": 100,
                    "Binmaley": 150,
                    "Lingayen": 200,
                    "Calasiao": 125
                };

                const hourlyRates = {
                    1: 500,
                    2: 600,
                    3: 700,
                    4: 800,
                    5: 900,
                    6: 1000,
                    7: 1100,
                    8: 1200,
                    9: 1300,
                    10: 1400,
                    11: 1500,
                    12: 1600,
                    13: 1700,
                    14: 1800,
                    15: 1900,
                    16: 2000
                };

                // Calculate duration
                const startHour = parseInt(startTime.split(':')[0], 10);
                const endHour = parseInt(endTime.split(':')[0], 10);

                // Ensure end time is greater than start time
                if (endHour <= startHour) {
                    alert("End time must be later than start time.");
                    document.getElementById('price').value = ''; // Clear price if end time is invalid
                    return; // Exit the function
                }

                const duration = endHour - startHour;

                if (serviceId && locationId && duration > 0) {
                    const servicePrice = servicePrices[serviceId];
                    const locationPrice = locationPrices[locationId];
                    const hourlyPrice = hourlyRates[duration] || 0; // Use duration directly

                    // Total price calculation
                    const totalPrice = servicePrice + locationPrice + hourlyPrice;
                    document.getElementById('price').value = totalPrice;
                } else {
                    document.getElementById('price').value = ''; // Clear price if inputs are not valid
                }
            };

            // Bind change events
            document.querySelector('select[name="service_id"]').addEventListener('change', calculatePrice);
            document.querySelector('select[name="location"]').addEventListener('change', calculatePrice);
            document.querySelector('select[name="booking_time"]').addEventListener('change', calculatePrice);
            document.querySelector('select[name="end_time"]').addEventListener('change', calculatePrice);

            $("#bookingForm").on("submit", function (event) {
                event.preventDefault(); // Prevent the default form submission
                const bookingDate = $("#booking_date").val();
                const serviceId = $("select[name='service_id']").val();
                const bookingTime = $("select[name='booking_time']").val();
                const endTime = $("select[name='end_time']").val();

                // Check if the end time is before the booking time
                if (endTime <= bookingTime) {
                    alert("End time cannot be before booking time.");
                    return;
                }

                // Calculate the price before submitting
                calculatePrice(); // Ensure the price is calculated before proceeding

                const totalPrice = document.getElementById('price').value;

                // Show alert if total price is empty
                if (!totalPrice) {
                    alert("Please select valid options to calculate the total price.");
                    return;
                }

                $.ajax({
                    url: "{{ url('check_booking') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        booking_date: bookingDate,
                        booking_time: bookingTime,
                        end_time: endTime,
                        service_id: serviceId // Include the service ID for validation
                    },
                    success: function (response) {
                        if (response.canBook) {
                            $("#bookingForm").off("submit").submit(); // Submit the form if booking is allowed
                        } else {
                            $('#bookingAlertModal').modal('show'); // Show the modal if booking is not allowed
                        }
                    },
                    error: function () {
                        alert("An error occurred while checking the booking.");
                    }
                });
            });
        });
    </script>
</body>

</html>
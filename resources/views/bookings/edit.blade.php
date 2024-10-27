<!DOCTYPE html>
<html>

<head>
    <title>J.PED | Edit Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

    <!-- Flatpickr CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Load Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;

    }

    .container-custom {
        display: flex;
        /* Use flexbox for centering */
        justify-content: center;
        /* Center horizontally */
        align-items: center;
        /* Center vertically */
        height: 100%;
        /* Full height of the container */
    }

    .form-box {
        border: 1px solid #dee2e6;
        /* Light gray border */
        border-radius: 10px;
        /* Rounded corners */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        /* Subtle shadow for depth */
        padding: 50px;
        /* Reduced inner padding */
        background-color: #ffffff;
        /* White background for form */
        margin: 20px auto;
        /* Center the box with top/bottom margin */
        max-width: 700px;
        /* Set a maximum width for the form box */
    }

    h1 {
        color: black;
        /* Darker heading color */
        margin-bottom: 20px;
        /* More space below heading */
        margin-left: 210px;

    }

    h2 {
        color: #343a40;
        /* Darker heading color */
        margin-bottom: 20px;
        /* More space below heading */
    }

    .alert {
        margin-bottom: 20px;
        /* Space below alerts */
    }

    .card {
        border: 1px solid #dee2e6;
        /* Border around card */
        border-radius: 10px;
        /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
        padding: 20px;
        /* Padding inside card */
        background-color: #ffffff;
        /* White background for card */
        padding: 90px;
    }

    .form-group {
        display: flex;
        /* Use flexbox for alignment */
        flex-direction: column;
        /* Stack items vertically */
        margin-bottom: 20px;
        /* Space between form groups */
    }

    .form-label {
        font-weight: bold;
        /* Bold labels */
        color: #495057;
        /* Darker label color */
        margin-bottom: 5px;
        /* Space below the label */
    }

    .form-control,
    .form-select {
        border: 1px solid #ced4da;
        /* Light border for inputs */
        border-radius: 5px;
        /* Rounded corners for inputs */
        width: 70%;
        /* Allow the input fields to shrink to fit the content */
        display: inline-block;
        /* Keep them inline */
        margin-left: 20px;
        /* Add space between label and input */
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #80bdff;
        /* Blue border on focus */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        /* Shadow on focus */
    }

    button.btn-primary {
        background-color: #007bff;
        /* Primary button color */
        border: none;
        /* No border */
        padding: 10px 20px;
        /* Padding inside button */
        border-radius: 5px;
        /* Rounded button corners */
        font-weight: bold;
        /* Bold text */

    }

    button.btn-primary:hover {
        background-color: #0056b3;
        /* Darker on hover */
    }

    @media (max-width: 576px) {
        .container {
            padding: 0 15px;
            /* Padding for small screens */
        }

        .card {
            margin: 0;
            /* No margin for small screens */
        }
    }
</style>


<body>

    <!-- Navigation Bar -->
    @include('Layouts.navbar')

    <br><br><br><br><br>
    <div class="container-custom"></div>

    <div class="container mt-5">

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


        <form action="{{ route('bookings.update', $booking->id) }}" method="POST" id="bookingForm" class="form-box">
            <h1> Edit Book</h1>
            @csrf
            @method('POST') <!-- Use PUT if you're following RESTful conventions -->

            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $booking->name) }}" readonly>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" id="email" class="form-control" name="email"
                    value="{{ old('email', $booking->email) }}" readonly>
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
                <select name="location" id="location" class="form-select"
                    value="{{ old('location', $booking->location) }}" required>
                    <option value="" {{ $booking->location == '' ? 'selected' : '' }}>Choose a location...</option>
                    <option value="Agno" {{ $booking->location == 'Agno' ? 'selected' : '' }}>Agno</option>
                    <option value="Alaminos" {{ $booking->location == 'Alaminos' ? 'selected' : '' }}>Alaminos</option>
                    <option value="Anda" {{ $booking->location == 'Anda' ? 'selected' : '' }}>Anda</option>
                    <option value="Balungao" {{ $booking->location == 'Balungao' ? 'selected' : '' }}>Balungao</option>
                    <option value="Bani" {{ $booking->location == 'Bani' ? 'selected' : '' }}>Bani</option>
                    <option value="Basista" {{ $booking->location == 'Basista' ? 'selected' : '' }}>Basista</option>
                    <option value="Bayambang" {{ $booking->location == 'Bayambang' ? 'selected' : '' }}>Bayambang</option>
                    <option value="Binalonan" {{ $booking->location == 'Binalonan' ? 'selected' : '' }}>Binalonan</option>
                    <option value="Binmaley" {{ $booking->location == 'Binmaley' ? 'selected' : '' }}>Binmaley</option>
                    <option value="Bolinao" {{ $booking->location == 'Bolinao' ? 'selected' : '' }}>Bolinao</option>
                    <option value="Bugallon" {{ $booking->location == 'Bugallon' ? 'selected' : '' }}>Bugallon</option>
                    <option value="Burgos" {{ $booking->location == 'Burgos' ? 'selected' : '' }}>Burgos</option>
                    <option value="Calasiao" {{ $booking->location == 'Calasiao' ? 'selected' : '' }}>Calasiao</option>
                    <option value="Dagupan City" {{ $booking->location == 'Dagupan City' ? 'selected' : '' }}>Dagupan City
                    </option>
                    <option value="Dasol" {{ $booking->location == 'Dasol' ? 'selected' : '' }}>Dasol</option>
                    <option value="Laoac" {{ $booking->location == 'Laoac' ? 'selected' : '' }}>Laoac</option>
                    <option value="Lingayen" {{ $booking->location == 'Lingayen' ? 'selected' : '' }}>Lingayen</option>
                    <option value="Manaoag" {{ $booking->location == 'Manaoag' ? 'selected' : '' }}>Manaoag</option>
                    <option value="Mangaldan" {{ $booking->location == 'Mangaldan' ? 'selected' : '' }}>Mangaldan</option>
                    <option value="Mangatarem" {{ $booking->location == 'Mangatarem' ? 'selected' : '' }}>Mangatarem
                    </option>
                    <option value="Mapandan" {{ $booking->location == 'Mapandan' ? 'selected' : '' }}>Mapandan</option>
                    <option value="Natividad" {{ $booking->location == 'Natividad' ? 'selected' : '' }}>Natividad</option>
                    <option value="Rosales" {{ $booking->location == 'Rosales' ? 'selected' : '' }}>Rosales</option>
                    <option value="San Fabian" {{ $booking->location == 'San Fabian' ? 'selected' : '' }}>San Fabian
                    </option>
                    <option value="San Jacinto" {{ $booking->location == 'San Jacinto' ? 'selected' : '' }}>San Jacinto
                    </option>
                    <option value="San Manuel" {{ $booking->location == 'San Manuel' ? 'selected' : '' }}>San Manuel
                    </option>
                    <option value="San Nicolas" {{ $booking->location == 'San Nicolas' ? 'selected' : '' }}>San Nicolas
                    </option>
                    <option value="San Quintin" {{ $booking->location == 'San Quintin' ? 'selected' : '' }}>San Quintin
                    </option>
                    <option value="Sison" {{ $booking->location == 'Sison' ? 'selected' : '' }}>Sison</option>
                    <option value="Sta. Barbara" {{ $booking->location == 'Sta. Barbara' ? 'selected' : '' }}>Sta. Barbara
                    </option>
                    <option value="Sta. Maria" {{ $booking->location == 'Sta. Maria' ? 'selected' : '' }}>Sta. Maria
                    </option>
                    <option value="Sual" {{ $booking->location == 'Sual' ? 'selected' : '' }}>Sual</option>
                    <option value="Tayug" {{ $booking->location == 'Tayug' ? 'selected' : '' }}>Tayug</option>
                    <option value="Umingan" {{ $booking->location == 'Umingan' ? 'selected' : '' }}>Umingan</option>
                    <option value="Urbiztondo" {{ $booking->location == 'Urbiztondo' ? 'selected' : '' }}>Urbiztondo
                    </option>
                    <option value="Urdaneta" {{ $booking->location == 'Urdaneta' ? 'selected' : '' }}>Urdaneta</option>
                    <option value="Villasis" {{ $booking->location == 'Villasis' ? 'selected' : '' }}>Villasis</option>

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
                        <option value="{{ sprintf('%02d:00', $i) }}" {{ old('booking_time', $booking->booking_time) == sprintf('%02d:00', $i) ? 'selected' : '' }}>
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
                        <option value="{{ sprintf('%02d:00', $i) }}" {{ old('end_time', $booking->end_time) == sprintf('%02d:00', $i) ? 'selected' : '' }}>
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


            <div class="d-flex justify-content-center mb-3">
                <button type="submit" class="btn btn-primary">Update Booking</button>
                <button type="button" class="btn btn-secondary ms-2" onclick="window.history.back()">Back</button>
            </div>


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
                    "Agno": 800,
                    "Alaminos": 600,
                    "Anda": 500,
                    "Balungao": 400,
                    "Bani": 500,
                    "Basista": 350,
                    "Bayambang": 350,
                    "Binalonan": 400,
                    "Binmaley": 150,
                    "Bolinao": 800,
                    "Bugallon": 400,
                    "Burgos": 800,
                    "Calasiao": 150,
                    "Dagupan City": 100,
                    "Dasol": 500,
                    "Laoac": 300,
                    "Lingayen": 300,
                    "Manaoag": 250,
                    "Mangaldan": 200,
                    "Mangatarem": 400,
                    "Mapandan": 300,
                    "Natividad": 600,
                    "Rosales": 400,
                    "San Fabian": 400,
                    "San Jacinto": 300,
                    "San Manuel": 600,
                    "San Nicolas": 600,
                    "San Quintin": 600,
                    "Sison": 400,
                    "Sta. Barbara": 300,
                    "Sta. Maria": 500,
                    "Sual": 300,
                    "Tayug": 500,
                    "Umingan": 600,
                    "Urbiztondo": 600,
                    "Urdaneta": 400,
                    "Villasis": 400
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

                // Show alert if booking date is not selected
                if (!bookingDate) {
                    alert("Please select a booking date.");
                    return;
                }

                // Check availability before submitting
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
                            alert("The selected time slot is not available. Please choose another time.");
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
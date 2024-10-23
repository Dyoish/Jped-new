<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JPED | Book Form</title>
    <link rel="stylesheet" href="dashboard.css">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Load Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Ensure jQuery is loaded first -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Flatpickr CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- Include FullCalendar CSS and JS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>


    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }

        /* Navigation placeholder styling */
        .navbar-placeholder {
            height: 80px;
            width: 100%;
        }

        .container-custom {
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .container-form {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 54.5px;
        }

        .container-form h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            padding: 10px;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: rgba(0, 0, 0, 0.6);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: black;
        }

        .carousel img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    @include('Layouts.navbar')

    <!-- Spacing after navbar -->
    <div class="navbar-placeholder"></div>

    <div class="container-custom">
        <div class="row">
            <!-- Carousel column (Left side) -->
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/portraits/erika.jpg" class="d-block w-100" alt="Slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="images/concert/eleben.jpg" class="d-block w-100" alt="Slide 2">
                        </div>
                        <div class="carousel-item">
                            <img src="images/cosplay/nami.jpg" class="d-block w-100" alt="Slide 3">
                        </div>
                        <div class="carousel-item">
                            <img src="images/products/capp.jpg" class="d-block w-100" alt="Slide 4">
                        </div>
                        <div class="carousel-item">
                            <img src="images/companion/browny.jpg" class="d-block w-100" alt="Slide 5">
                        </div>
                        <div class="carousel-item">
                            <img src="images/model/one.jpg" class="d-block w-100" alt="Slide 6">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- Form column (Right side) -->
            <div class="col-md-6">
                <div class="container-form">
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

                    <form action="{{ url('add_booking') }}" method="POST" onsubmit="return validateEmail()">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your full name"
                                value="{{ auth()->user()->name }}" required readonly>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email" value="{{ auth()->user()->email }}" required readonly>
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
                            <input type="text" class="form-control" id="booking_date" name="booking_date"
                                placeholder="Select a date" required>
                        </div>

                        <div class="mb-3">
                            <label for="booking_time" class="form-label">Select Time</label>
                            <select name="booking_time" class="form-select" required>
                                <option value="">Choose a time...</option>
                                <option value="06:00">6:00 AM</option>
                                <option value="07:00">7:00 AM</option>
                                <option value="08:00">8:00 AM</option>
                                <option value="09:00">9:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="13:00">1:00 PM</option>
                                <option value="14:00">2:00 PM</option>
                                <option value="15:00">3:00 PM</option>
                                <option value="16:00">4:00 PM</option>
                                <option value="17:00">5:00 PM</option>
                                <option value="18:00">6:00 PM</option>
                                <option value="19:00">7:00 PM</option>
                                <option value="20:00">8:00 PM</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Book Now</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal for booking alert -->
    <div class="modal fade" id="bookingAlertModal" tabindex="-1" aria-labelledby="bookingAlertModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingAlertModalLabel">Booking Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    This date is already booked for the selected service. Please choose another date.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            // Initialize Flatpickr for the booking date
            flatpickr("#booking_date", {
                dateFormat: "Y-m-d", // Format the date
                minDate: "today", // Disable past dates
                defaultDate: "today", // Optional: pre-fill today's date
            });

            $("#bookingForm").on("submit", function (event) {
                event.preventDefault(); // Prevent default form submission

                // Get the selected date and service
                const bookingDate = $("#booking_date").val();
                const serviceId = $("select[name='service_id']").val();

                // Check for existing bookings via AJAX
                $.ajax({
                    url: "{{ url('check_booking') }}", // Your new route
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        booking_date: bookingDate,
                        service_id: serviceId,
                    },
                    success: function (response) {
                        if (response.canBook) {
                            $("#bookingForm").off("submit").submit(); // Proceed with submission
                        } else {
                            // Show the modal instead of an alert
                            $('#bookingAlertModal').modal('show');
                        }
                    },
                    error: function () {
                        alert("An error occurred while checking the booking.");
                    }
                });
            });
        });

        function validateEmail() {
            const emailInput = document.getElementById('email').value;
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!emailPattern.test(emailInput)) {
                alert('Please enter a valid email address.');
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>


</body>

</html>
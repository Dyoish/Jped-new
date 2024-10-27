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
        /* Overall body styling */
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

        /* Main container customization */
        .container-custom {
            max-width: 1150px;
            /* Reduced max-width for a tighter layout */
            margin: 0 auto;
            padding: 20px;
        }

        /* Form container styling */
        .container-form {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 25px;
        }

        /* Form header */
        .container-form h2 {
            margin-bottom: 15px;
            color: #333;
            text-align: center;
            font-size: 20px;
        }

        /* Label styling */
        .form-label {
            font-weight: 600;
            font-size: 14px;
            /* Smaller font for compactness */
            color: #333;
        }

        /* Input and select field styling */
        .form-control,
        .form-select {
            font-size: 14px;
            /* Reduced font size for compact appearance */
            padding: 8px;
            border-radius: 5px;
        }

        /* Button styling */
        .btn-primary {
            background-color: #333;
            /* Consistent color scheme */
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        /* Button hover effect */
        .btn-primary:hover {
            background-color: #000;
        }

        /* Carousel image styling */
        .carousel img {
            width: 100%;
            height: 100%;
            max-height: 1200px;
            /* Limit the height */
            object-fit: cover;
            border-radius: 8px;
        }

        /* Success and error alert box */
        .alert {
            font-size: 14px;
            /* Compact font */
            padding: 10px;
            margin-top: 15px;
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

                    <form id="bookingForm" action="{{ url('add_booking') }}" method="POST"
                        onsubmit="return validateEmail()">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your full name"
                                value="{{ auth()->user()->name }}" required readonly>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
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

                        <!-- New location dropdown field -->
                        <div class="mb-3">
                            <label for="location" class="form-label">Select Location</label>
                            <select name="location" id="location" class="form-select" required>
                                <option value="">Choose a location...</option>
                                <option value="Agno">Agno</option>
                                <option value="Aguilar">Aguilar</option>
                                <option value="Alaminos">Alaminos</option>
                                <option value="Alcala">Alcala</option>
                                <option value="Anda">Anda</option>
                                <option value="Asingan">Asingan</option>
                                <option value="Balungao">Balungao</option>
                                <option value="Bani">Bani</option>
                                <option value="Basista">Basista</option>
                                <option value="Bautista">Bautista</option>
                                <option value="Bayambang">Bayambang</option>
                                <option value="Binalonan">Binalonan</option>
                                <option value="Binmaley">Binmaley</option>
                                <option value="Bolinao">Bolinao</option>
                                <option value="Bugallon">Bugallon</option>
                                <option value="Burgos">Burgos</option>
                                <option value="Calasiao">Calasiao</option>
                                <option value="Dagupan City">Dagupan City</option>
                                <option value="Dasol">Dasol</option>
                                <option value="Infanta">Infanta</option>
                                <option value="Labrador">Labrador</option>
                                <option value="Laoac">Laoac</option>
                                <option value="Lingayen">Lingayen</option>
                                <option value="Mabini">Mabini</option>
                                <option value="Malasiqui">Malasiqui</option>
                                <option value="Manaoag">Manaoag</option>
                                <option value="Mangaldan">Mangaldan</option>
                                <option value="Mangatarem">Mangatarem</option>
                                <option value="Mapandan">Mapandan</option>
                                <option value="Natividad">Natividad</option>
                                <option value="Pozorrubio">Pozorrubio</option>
                                <option value="Rosales">Rosales</option>
                                <option value="San Carlos City">San Carlos City</option>
                                <option value="San Fabian">San Fabian</option>
                                <option value="San Jacinto">San Jacinto</option>
                                <option value="San Manuel">San Manuel</option>
                                <option value="San Nicolas">San Nicolas</option>
                                <option value="San Quintin">San Quintin</option>
                                <option value="Sison">Sison</option>
                                <option value="Sta. Barbara">Sta. Barbara</option>
                                <option value="Sta. Maria">Sta. Maria</option>
                                <option value="Sto. Tomas">Sto. Tomas</option>
                                <option value="Sual">Sual</option>
                                <option value="Tayug">Tayug</option>
                                <option value="Umingan">Umingan</option>
                                <option value="Urbiztondo">Urbiztondo</option>
                                <option value="Urdaneta">Urdaneta</option>
                                <option value="Villasis">Villasis</option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="booking_time" class="form-label">Select Start Time</label>
                            <select name="booking_time" id="booking_time" class="form-select" required>
                                <option value="">Choose a start time...</option>
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
                                <option value="21:00">9:00 PM</option>
                                <option value="22:00">10:00 PM</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="end_time" class="form-label">Select End Time</label>
                            <select name="end_time" id="end_time" class="form-select" required>
                                <option value="">Choose an end time...</option>
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
                                <option value="21:00">9:00 PM</option>
                                <option value="22:00">10:00 PM</option>
                            </select>
                        </div>

                        <!-- Add this div below the service dropdown -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" id="price" class="form-control" placeholder="Price will appear here"
                                readonly>
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
                    This date has already been booked. Please choose another date.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(function () {
            flatpickr("#booking_date", {
                dateFormat: "Y-m-d",
                minDate: "today",
                defaultDate: "today",
            });

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

        function calculatePrice() {
            // Get selected values
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
                "1 hour": 500,
                "2 hours": 600,
                "3 hours": 700,
                "4 hours": 800,
                "5 hours": 900,
                "6 hours": 1000,
                "7 hours": 1100,
                "8 hours": 1200,
                "9 hours": 1300,
                "10 hours": 1400,
                "11 hours": 1500,
                "12 hours": 1600,
                "13 hours": 1700,
                "14 hours": 1800,
                "15 hours": 1900,
                "16 hours": 2000
            };

            // Calculate duration
            const startHour = parseInt(startTime.split(':')[0], 10);
            const endHour = parseInt(endTime.split(':')[0], 10);

            // Debugging log
            console.log("Start Hour:", startHour, "End Hour:", endHour);

            // Ensure end time is greater than start time
            if (endHour <= startHour) {
                alert("End time must be later than start time.");
                document.getElementById('price').value = ''; // Clear price if end time is invalid
                return; // Exit the function
            }

            const duration = endHour - startHour;

            // Debugging log
            console.log("Duration:", duration);

            if (serviceId && locationId && duration > 0) {
                const servicePrice = servicePrices[serviceId];
                const locationPrice = locationPrices[locationId];
                const hourlyPrice = hourlyRates[duration + ' hour' + (duration > 1 ? 's' : '')]; // Adjust key for pluralization

                // Debugging log
                console.log("Service Price:", servicePrice, "Location Price:", locationPrice, "Hourly Price:", hourlyPrice);

                // Total price calculation
                const totalPrice = servicePrice + locationPrice + (hourlyPrice || 0); // Add 0 if hourlyPrice is undefined
                document.getElementById('price').value = totalPrice;
            } else {
                document.getElementById('price').value = ''; // Clear price if inputs are not valid
            }
        }

        document.querySelector('select[name="service_id"]').addEventListener('change', calculatePrice);
        document.querySelector('select[name="location"]').addEventListener('change', calculatePrice);
        document.querySelector('select[name="booking_time"]').addEventListener('change', calculatePrice);
        document.querySelector('select[name="end_time"]').addEventListener('change', calculatePrice);

        function validateEmail() {
            const emailInput = document.getElementById('email').value;
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!emailPattern.test(emailInput)) {
                alert('Please enter a valid email address.');
                return false;
            }
            return true;
        }
    </script>

</body>

</html>
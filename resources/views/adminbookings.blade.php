<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap" />
    <link rel="stylesheet" href="{{ asset('assests/css/bootstrap.css') }}">
    <link rel="stylesheet" href="assets/css/analytics.css" />
    <script src="{{ asset('assests/js/jquery.js') }}"></script>
    <title>Dashboard</title>
</head>

<body>

    @if(session('success'))
        <div
            style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a class="brand">
            <span class="text" style="margin-top: 20px; margin-left: 100px;">J.PED</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="{{ url('/admindashboards') }}">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboards</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ url('/adminbookings') }}">
                    <i class="bx bxs-analyse"></i>
                    <span class="text">Booking</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/adminstatistics') }}">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Service</span>
                </a>
            </li>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <li>
                <a class="dropdown-item text-center" href="{{route('logout')}}" style="color: red;">
                    <i class="bx bxs-log-out"></i> Log out
                </a>
            </li>
        </ul>
    </section>

    <!-- CONTENT -->
    <section id="content" style="padding: 30px;">
        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Booking</h1>
                </div>
            </div>

            <!-- Box info for New Customers -->
            <ul class="box-info" style="list-style: none; padding: 0; display: flex; flex-direction: column;">
                <li style="background-color: #f5f5f5; padding: 20px; border-radius: 8px;">
                    <table class="table" style="width: 100%; margin-top: 20px; border-collapse: collapse;">
                        <thead>
                            <tr style="background-color: #007bff; color: #fff; text-align: left;">
                                <th style="padding: 10px;">ID</th>
                                <th style="padding: 10px;">Name</th>
                                <th style="padding: 10px;">Email</th>
                                <th style="padding: 10px;">Service</th>
                                <th style="padding: 10px;">Booking Date</th>
                                <th style="padding: 10px;">Booking Time</th>
                                <th style="padding: 10px;">Status</th> <!-- Add Status Column -->
                                <th style="padding: 10px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->name ?? 'N/A' }}</td> <!-- Safeguard for missing booking name -->
                                    <td>{{ $booking->email ?? 'N/A' }}</td>
                                    <td>{{ optional($booking->service)->name ?? 'N/A' }}</td>
                                    <!-- Safeguard for missing service relationship -->
                                    <td>{{ $booking->booking_date ?? 'N/A' }}</td>
                                    <td>{{ $booking->booking_time ?? 'N/A' }}</td>
                                    <td>{{ ucfirst($booking->status ?? 'N/A') }}</td> <!-- Safeguard for missing status -->
                                    <td>
                                        @if($booking->status == 'pending')
                                            <form action="{{ route('bookings.approve', $booking->id) }}" method="POST">
                                                @csrf
                                                <button type="submit">Approve</button>
                                            </form>
                                            <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                            </form>
                                        @else
                                            {{ ucfirst($booking->status ?? 'N/A') }} <!-- Display final status -->
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </li>
            </ul>
        </main>
    </section>
</body>

</html>
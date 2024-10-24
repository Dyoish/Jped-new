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
    <link rel="stylesheet" href="assets/css/analytics.css" />
    <script src="{{ asset('assests/js/jquery.js') }}"></script>
    <title>JPED | Dashboard</title>

    <style>
        /* Hide scrollbars */
        body {
            overflow-y: hidden;
            /* Hides vertical scrollbar */
            overflow-x: hidden;
            /* Hides horizontal scrollbar */
            margin: 0;
            /* Removes default body margin */
            padding: 0;
            /* Removes default body padding */
        }

        /* Improved ul styling */
        ul.box-info {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul.box-info li {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }


        /* Improved table styling */
        table.table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
        }

        table.table thead {
            background-color: #007bff;
            color: white;
        }

        table.table thead th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #ddd;
        }

        table.table tbody td {
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }

        table.table tbody tr:hover {
            background-color: #f9f9f9;
            cursor: pointer;
        }

        /* Button Styling */
        table.table tbody td button {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
        }

        table.table tbody td button.btn-danger {
            background-color: #e74c3c;
            color: #fff;
        }

        table.table tbody td button:hover {
            opacity: 0.9;
        }

        /* General form and table alignments */
        td {
            vertical-align: middle !important;
        }

        form {
            display: inline;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        h1 {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--dark);
        }
    </style>
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
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <li>
                <a href="{{route('logout') }}" style="color: red;">
                    <i class="bx bxs-log-out"></i> Log out
                </a>
            </li>
        </ul>
    </section>

    <!-- CONTENT -->
    <section id="content" style="padding: 25px;">
        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Booking</h1>
                </div>
            </div>

            <!-- Box info for New Customers -->
            <ul class="box-info">
                <li>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Service</th>
                                <th>Booking Date</th>
                                <th>Booking Time</th>
                                <th>Status</th> <!-- Add Status Column -->
                                <th>Action</th>
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
                                                <button type="submit" class="btn btn-primary">Approve</button>
                                            </form>
                                            <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Reject</button>
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
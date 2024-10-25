<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/analytics.css" />
    <!-- Load Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="{{ asset('assests/js/jquery.js') }}"></script>
    <title>JPED | Dashboard</title>



    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

        /* Hide scrollbars */
        body {
            font-family: 'Poppins', sans-serif;
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

        .status-accepted {
            color: green;
            /* Green color for accepted status */
        }

        .status-rejected {
            color: red;
            /* Red color for rejected status */
        }

        .status-pending {
            color: orange;
            /* Yellow color for pending status */
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
                    <i class='bx bx-book-add'></i>
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
                    <!-- Small Button Below the Title -->
                    <button id="exportButton" class="btn btn-success btn-sm" style="margin-top: 10px;">Export to
                        CSV</button>
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
                                <th>Location</th>
                                <th>Booking Date</th>
                                <th>Booking Time</th>
                                <th>End Time</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->name ?? 'N/A' }}</td>
                                    <td>{{ $booking->email ?? 'N/A' }}</td>
                                    <td>{{ optional($booking->service)->name ?? 'N/A' }}</td>
                                    <td>{{ $booking->location ?? 'N/A' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('Y-m-d') ?? 'N/A' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->booking_time)->format('h:i A') ?? 'N/A' }}</td>
                                    <!-- AM added -->
                                    <td>{{ \Carbon\Carbon::parse($booking->end_time)->format('h:i A') ?? 'N/A' }}</td>
                                    <!-- PM added -->
                                    <td>{{ $booking->price ?? 'N/A' }}</td>
                                    <td class="{{ $booking->status == 'pending' ? 'status-pending' : '' }}
                                {{ $booking->status == 'accepted' ? 'status-accepted' : '' }}
                                {{ $booking->status == 'rejected' ? 'status-rejected' : '' }}">
                                        {{ ucfirst($booking->status ?? 'N/A') }}
                                    </td>
                                    <td>
                                        @if($booking->status == 'pending')
                                            <form action="{{ route('bookings.approve', $booking->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Approve</button>
                                            </form>
                                            <form action="{{ route('bookings.reject', $booking->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Reject</button>
                                            </form>
                                        @else
                                            {{ ucfirst($booking->status ?? 'N/A') }}
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

    <script>
        document.getElementById('exportButton').addEventListener('click', function () {
            const table = document.querySelector('table');
            let csvContent = "data:text/csv;charset=utf-8,";

            // Get header row
            const headers = Array.from(table.querySelectorAll('thead th'))
                .map(th => th.innerText.replace(/,/g, '')); // Escape commas
            csvContent += headers.join(",") + "\n";

            // Get table rows
            Array.from(table.rows).forEach(row => {
                const rowData = Array.from(row.cells)
                    .map(cell => cell.innerText.replace(/,/g, '')); // Escape commas
                csvContent += rowData.join(",") + "\n";
            });

            // Create and download CSV file
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "bookings.csv");
            document.body.appendChild(link); // Required for Firefox
            link.click();
            document.body.removeChild(link);
        });
    </script>
</body>

</html>
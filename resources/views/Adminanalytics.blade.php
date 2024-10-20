<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Dashboard</title>
</head>

<body>

@if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

<!-- SIDEBAR -->
<section id="sidebar" style="width: 250px; height: 100vh; background-color: #333; color: #fff; position: fixed; padding-top: 20px;">
    <a class="brand">
            <span class="text" style="margin-top: 20px; margin-left: 100px;">J.PED</span>
        </a>
    <ul class="side-menu" style="list-style-type: none; padding: 0; margin-top: 50px;">
        <li class="active" style="margin-bottom: 15px;">
            <a href="{{ url('/admindashboards') }}" style="text-decoration: none; color: #fff; padding: 10px 20px; display: block;">
                <i class="bx bxs-dashboard"></i>
                <span class="text">Dashboards</span>
            </a>
        </li>
        <li style="margin-bottom: 15px;">
            <a href="{{ url('/adminanalytics') }}" style="text-decoration: none; color: #fff; padding: 10px 20px; display: block;">
                <i class="bx bxs-group"></i>
                <span class="text">Booking</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item text-center" href="{{route('logout')}}" style="text-decoration: none; color: red; padding: 10px 20px; display: block; text-align: center;">
                <i class="bx bxs-log-out"></i> Log out
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->

<!-- CONTENT -->
<section id="content" style="margin-left: 250px; padding: 40px;">
    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
            </div>
        </div>

        <!-- Box info for New Customers -->
        <ul class="box-info" style="list-style: none; padding: 0; display: flex; flex-direction: column;">
            <li style="background-color: #f5f5f5; padding: 20px; border-radius: 8px;">
                <h3>New Customers</h3>
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
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->service->name }}</td> <!-- Assuming relationship between booking and service -->
                            <td>{{ $booking->booking_date }}</td>
                            <td>{{ $booking->booking_time }}</td>
                            <td>{{ ucfirst($booking->status) }}</td> <!-- Display status -->
                            <td>
                                @if($booking->status == 'pending')
                                    <form action="{{ route('bookings.approve', $booking->id) }}" method="POST">
                                        @csrf
                                        <button type="submit">Approve</button>
                                    </form>
                                    <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                    </form>
                                    @else
                                        {{ ucfirst($booking->status) }} <!-- Display final status -->
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

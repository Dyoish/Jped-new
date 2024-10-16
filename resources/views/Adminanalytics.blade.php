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
    <a href="/" class="brand" style="text-decoration: none; color: #fff;">
        <span class="text" style="font-size: 24px; display: block; text-align: center; margin-top: 20px;">J.PED</span>
    </a>
    <ul class="side-menu" style="list-style-type: none; padding: 0; margin-top: 50px;">
        <li class="active" style="margin-bottom: 15px;">
            <a href="{{ url('/admindashboards') }}" style="text-decoration: none; color: #fff; padding: 10px 20px; display: block;">
                <i class="bx bxs-dashboard"></i>
                <span class="text">Dashboards</span>
            </a>
        </li>
        <li style="margin-bottom: 15px;">
            <a href="{{ url('/admincustomers') }}" style="text-decoration: none; color: #fff; padding: 10px 20px; display: block;">
                <i class="bx bxs-group"></i>
                <span class="text">Customers</span>
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

        <!-- Box info for Total Users -->
        <ul class="box-info" style="list-style: none; padding: 0; display: flex;">
            <li style="background-color: #f5f5f5; padding: 20px; margin-right: 20px; flex: 1; border-radius: 8px;">
                <i class="bx bxs-group" style="font-size: 40px;"></i>
                <span class="text">
                    <h3>Users</h3>
                    <p>Total Users: {{number_format($usercount)}}</p>
                </span>
            </li>
        </ul>

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
                            <th style="padding: 10px;">Booking Date</th>
                            <th style="padding: 10px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->slice(0,5) as $item)
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 10px;">{{$item -> id }}</td>
                            <td style="padding: 10px;">{{$item -> name}}</td>
                            <td style="padding: 10px;">{{$item -> email}}</td>
                            <td style="padding: 10px;">{{ $item->booking_date }}</td>
                            <td style="padding: 10px;">
                                <form method="POST" action="{{ route('approveBooking', $item->id) }}" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success" style="background-color: green; border: none; padding: 10px 20px; color: white; border-radius: 5px; cursor: pointer;">Approve</button>
                                </form>
                                <form method="POST" action="{{ route('rejectBooking', $item->id) }}" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" style="background-color: red; border: none; padding: 10px 20px; color: white; border-radius: 5px; cursor: pointer;">Reject</button>
                                </form>
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

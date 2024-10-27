<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assests/css/bootstrap.css') }}">
    <link rel="stylesheet" href="assets/css/analytics.css" />
    <!-- Load Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="{{ asset('assests/js/jquery.js') }}"></script>
    <title>Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .box-info-smol {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 0;
            list-style-type: none;
            margin-left: 35px;
        }

        .box-info-smol li {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            width: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .box-info-smol li:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }

        .box-info-smol h4 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .box-info-smol p {
            font-size: 16px;
            color: #666;
            margin: 10px 0 0;
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a class="brand">
            <span class="text" style="margin-top: 20px; margin-left: 100px;">J.PED</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="{{ url('/admindashboards') }}">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboards</span>
                </a>
            </li>
            <li>
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
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <br>
        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb"></ul>
                </div>
            </div>

            <ul class="box-info-smol">
                <li>
                    <span class="text">
                        <h4>Portrait Photography Bookings:</h4>
                        <p>{{ $portraitBookingsCount }}</p>
                    </span>
                </li>
                <li>
                    <span class="text">
                        <h4>Concert Photography Bookings:</h4>
                        <p>{{ $concertBookingsCount }}</p>
                    </span>
                </li>
                <li>
                    <span class="text">
                        <h4>Cosplay Photography Bookings:</h4>
                        <p>{{ $cosplayBookingsCount }}</p>
                    </span>
                </li>
                <li>
                    <span class="text">
                        <h4>Product Photography Bookings:</h4>
                        <p>{{ $productBookingsCount }}</p>
                    </span>
                </li>
                <li>
                    <span class="text">
                        <h4>Companion Photography Bookings:</h4>
                        <p>{{ $companionBookingsCount }}</p>
                    </span>
                </li>
                <li>
                    <span class="text">
                        <h4>Model Photography Bookings:</h4>
                        <p>{{ $modelBookingsCount }}</p>
                    </span>
                </li>
            </ul>




            <ul class="box-info">
                <li>
                    <i class="bx bxs-group"></i>
                    <span class="text">
                        <h3>Clients</h3>
                        <p>Total Clients:
                            {{ number_format($usercount - ($user->contains('id', 1) ? 1 : 0)) }}
                        </p>
                    </span>
                </li>
            </ul>


            <ul class="box-info">
                <li>
                    <span>
                        <h3>Client Details</h3>
                    </span>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->slice(0, 5) as $item)
                                @if ($item->id != 1)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </li>
            </ul>

        </main>
    </section>
</body>

</html>
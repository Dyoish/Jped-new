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
    <link rel="stylesheet" href="assets/css/productmanagement.css" />
    <script src="{{ asset('assests/js/jquery.js') }}"></script>

    <title>Product Management</title>
    <style>
        a {
            color: blue;
        }

        .table-responsive {
            max-height: 670px;
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
            <li class="{{ request()->is('admindashboards') ? 'active' : '' }}">
                <a href="{{ url('/admindashboards') }}">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboards</span>
                </a>
            </li>
            <li class="{{ request()->is('adminbookings') ? 'active' : '' }}">
                <a href="{{ url('/adminbookings') }}">
                    <i class="bx bxs-analyse"></i>
                    <span class="text">Booking</span>
                </a>
            </li>
            <li class="{{ request()->is('adminstatistics') ? 'active' : '' }}">
                <a href="{{ url('/adminstatistics') }}">
                    <i class="bx bxs-bar-chart-alt-2"></i> <!-- Chart icon for statistics -->
                    <span class="text">Statistics</span>
                </a>
            </li>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <li>
                <a class="dropdown-item text-center" href="{{ route('logout') }}" style="color: red;">
                    <i class="bx bxs-log-out"></i> Log out
                </a>
            </li>
        </ul>
    </section>





</body>

</html>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top"
    style="background-color: rgba(0, 0, 0, 0.6); box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);">
    <!-- Added border-radius here -->

    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logoP.png') }}"
                style="height: 100%; max-height: 50px; object-fit: contain; margin-left: 2vw;">
        </a>

        <br>
    </div>

    @auth
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                <li class="nav-item" style="margin-left: 50px; margin-right: -10px; margin-top: 0px; color: white; ">
                    <a class="nav-link" aria-current="page" href="/" style="color: white;">Home</a>
                </li>
                <li class="nav-item" style="margin-left: 50px; margin-right: 45px; margin-top: 0px; color: white; ">
                    <a class="nav-link active" aria-current="page" href="/gallery" style="color: white;">Gallery</a>
                </li>

                <li class="nav-item" style="margin-right: 55px; margin-top: 7.5px;">
                    <a href="/booking-form" style="text-decoration: none; color: white; font-size: 17px;">Book</a>
                </li>

                <li class="nav-item" style="margin-right: 40px; margin-top: 8px;">
                    <a href="{{ route('show_all_bookings') }}"
                        style="text-decoration: none; color: white; font-size: 16px;">BookInfo</a>
                </li>

                <li class="nav-item" style="margin-right: 3vw;">
                    <div class=" nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; ">
                            {{auth()->user()->name}}
                        </a>
                        <div class="dropdown-menu ml-auto mr-auto" aria-labelledby="userDropdown"
                            style="margin-left: -2.5vw;">
                            <!-- Dropdown content goes here -->
                            <a class="dropdown-item text-center" href="/profile">My account</a>

                            <!-- Logout Form (hidden) -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <!-- Update the Logout Link -->
                            <a class="dropdown-item text-center" href="#" onclick="event.preventDefault(); logout();">Log
                                out</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    @else
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <div class="container-fluid">
                <ul class="navbar-nav mb-2 mb-lg-0">


                    <li class="nav-item" style="margin-left: 50px; margin-right: 50px; margin-top: 3px; color: white; ">
                        <a class="nav-link" aria-current="page" href="login" style="color: white;">Login</a>
                    </li>
                    <li class="nav-item" style="margin-right: 40px; margin-top: 3px; color: white;">
                        <a class="nav-link" aria-current="page" href="signup" style="color: white;">Signup</a>
                    </li>
                    <li class="nav-item" style="margin-right: 50px; margin-top: 3px; color: white;">
                        <a class="nav-link" aria-current="page" href="/adminlogin" style="color: white;">Admin</a>
                    </li>
                </ul>
            </div>
    @endauth

        <button class="navbar-toggler ms-auto mb-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>


    <script>
        function logout() {
            // Submit the logout form
            document.getElementById('logout-form').submit();

            // Optionally, you can show a loading spinner here or a message
            // Set a timeout to refresh the page after logout
            setTimeout(() => {
                window.location.reload(); // Refresh the page
            }, 1000); // Adjust the time as needed (in milliseconds)
        }
    </script>
</nav>
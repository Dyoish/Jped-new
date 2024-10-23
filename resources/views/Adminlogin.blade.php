<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JPED | Login</title>
    <link rel="stylesheet" href="login.css">
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        @font-face {
            font-family: "Spoof Trial Thin";
            src: url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.eot");
            src: url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.eot?#iefix") format("embedded-opentype"),
                url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.woff2") format("woff2"),
                url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.woff") format("woff"),
                url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.ttf") format("truetype"),
                url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.svg#Spoof Trial Thin") format("svg");
        }

        body {
            font-family: "Spoof Trial Thin", sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #121212;
            background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('images/bg/asd.png') center / cover no-repeat;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            width: 900px;
            display: flex;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .login-panel {
            background: transparent;
            border-radius: 10px;
            padding: 50px;
            width: 50%;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-left: 230px;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
        }

        .login-panel h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            margin-left: 50px;
            font-weight: bold;
            /* This makes the text bold */
        }

        .login-panel p {
            margin-bottom: 20px;
            margin-left: 60px;
        }

        .login-panel .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .login-panel .form-group input {
            background-color: transparent;
            color: white;
            border-radius: 30px;
            padding: 10px 20px;
            border: none;
            width: 100%;
            border: 2px solid rgba(255, 255, 255, .2);
        }

        /* Eye icon inside the input */
        .input-group i {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            cursor: pointer;
            color: white;
        }

        .login-panel .black-button {
            background-color: transparent;
            color: white;
            border-radius: 30px;
            padding: 10px;
            border: 2px solid rgba(255, 255, 255, .2);
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .login-panel .black-button:hover {
            background-color: #f1f1f1;
            color: #212529
        }

        .login-panel .black-link {
            color: #fff;
            text-decoration: none;
        }

        @media (max-width: 767px) {
            .container {
                flex-direction: column;
                width: 100%;
                height: 100%;
            }

            .login-panel,
            .signup-panel {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Content Section -->
    <div class="container">
        <!-- Login Form -->
        <div class="login-panel">
            <h1>Admin Login</h1>

            @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <form id="loginForm" action="{{route('adminpost')}}" method="post">
                @csrf

                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                </div>

                <div class="form-group" style="margin-bottom: 30px;">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter your password">
                    </div>
                </div>

                <button type="submit" class="btn btn-block black-button grey-hover">Login</button>
                <br>
            </form>
        </div>

        <div class="col-lg-6 col-md-3 col-sm-9 position-fixed text-left" style="left: 0; top: -40px;">
            <a href="/">
                <img src="images/black 2.png" alt="Left Image" style="width: 100%;">
            </a>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Password toggle script -->
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var togglePasswordIcon = document.getElementById("togglePassword");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordIcon.classList.remove("fa-eye");
                togglePasswordIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                togglePasswordIcon.classList.remove("fa-eye-slash");
                togglePasswordIcon.classList.add("fa-eye");
            }
        }
    </script>

</body>

</html>
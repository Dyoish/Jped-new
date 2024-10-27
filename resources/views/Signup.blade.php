<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JPED | Sign up</title>
    <link rel="icon" href="images/J.png" sizes="50x50" type="image/png"> <!-- Favicon link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Load Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #121212;

            /* Add your background image */
            background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('images/bg/login.png') center / cover no-repeat;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

        }

        .container {
            display: flex;
            justify-content: space-between;
            width: 900px;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        }

        .welcome-back {
            background-color: black;
            width: 45%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            margin-left: -15px;
        }

        .create-account {
            background: transparent;
            border-radius: 10px;
            padding: 50px;
            width: 30%;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(30px);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            margin-left: 50px;
            font-weight: bold;
            /* This makes the text bold */
        }

        .form-control {
            background: transparent;
            border: none;
            color: white;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 30px;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .form-group label {
            color: white;
        }

        .form-group {
            margin-bottom: 20px;
        }

        /* .btn-primary {
            background-color: #4d9584;
            border: none;
            padding: 20px;
            border-radius: 20px;
        }

        .btn-primary:hover {
            background-color: #937952;
        }

        .btn-black {
            background-color: transparent;
            color: white;
            border-radius: 30px;
            padding: 10px;
            border: 2px solid white; /* Add a border to make the button more visible 
            margin-top: 10px;
            transition: background-color 0.3s ease; /* Add a smooth transition for hover effect 
        }

        .btn-black-active {
            background-color: #ffffff;
        } */

        .toggle-btn {
            background: transparent;
            border: none;
            color: white;
            cursor: pointer;
        }

        .toggle-btn:focus {
            outline: none;
        }


        .btn-white {
            background-color: white;
            color: black;
            border: 2px solid rgba(255, 255, 255, .2);
            padding-right: 20px;
            padding-left: 20px;
            border-radius: 20px;


        }

        .btn-white:hover {
            background-color: transparent;
            color: white;
        }

        /* @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 100%;
                height: 100%;
            }

            .welcome-back,
            .create-account {
                width: 100%;
                border-radius: 0;
                padding: 20px;
            }

            .welcome-back {
                border-bottom-left-radius: 20px;
                border-bottom-right-radius: 20px;
            } 
        }*/
    </style>
</head>

<body>
    <!-- <div class="container">
        <div class="welcome-back">
            <h1>Welcome Back!</h1>
            <p>To keep connected with us please log in with your personal info</p>
            <a href="/login" class="btn btn-black black-button">Log in</a>
        </div> -->

    <div class="create-account">
        <h1>Create Account</h1>
        <form action="{{route('Signup.post')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your username">
                @error('name') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                @error('email') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter your password">
                    <!-- <div class="input-group-append">
                            <button type="button" class="toggle-btn" onclick="togglePassword()">👁️</button>
                        </div> -->
                </div>
                @error('password') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                        placeholder="Confirm your password">
                    <!-- <div class="input-group-append">
                            <button type="button" class="toggle-btn" onclick="toggleConfirmPassword()">👁️</button>
                        </div> -->
                </div>
            </div>
            <div class="button-container" style="text-align: center;">
                <button type="submit" class="btn btn-white">Sign-Up</button>
            </div>
        </form>
    </div>
    </div>

    <!--<footer>
        &copy; 2024 Cyber Cartel. All rights reserved.
    </footer>-->

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }

        function toggleConfirmPassword() {
            var confirmPasswordInput = document.getElementById("confirmPassword");
            if (confirmPasswordInput.type === "password") {
                confirmPasswordInput.type = "text";
            } else {
                confirmPasswordInput.type = "password";
            }
        }
    </script>
</body>

</html>
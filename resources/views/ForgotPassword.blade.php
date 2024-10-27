<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JPED | Reset Password</title>
    <link rel="icon" href="images/J.png" sizes="50x50" type="image/png"> <!-- Favicon link -->
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url("https://db.onlinewebfonts.com/c/215107c04d97667966f3b627c9e79860?family=Spoof+Trial+Thin");

        /* Font */
        @font-face {
            font-family: "Spoof Trial Thin";
            src: url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.eot");
            src: url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.eot?#iefix") format("embedded-opentype"),
                url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.woff2") format("woff2"),
                url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.woff") format("woff"),
                url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.ttf") format("truetype"),
                url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.svg#Spoof Trial Thin") format("svg");
        }

        /* Background and Form Styling */
        body {
            font-family: "Spoof Trial Thin", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            color: #fff;
            margin: 0;

            /* Add your background image */
            background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('images/bg/login.png') center / cover no-repeat;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            background: transparent;
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 120px;
            max-width: 600px;
            width: 100%;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            border: 2px solid rgba(255, 255, 255, .2);
        }

        .container h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .form-control {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            color: #fff;
            margin-bottom: 1rem;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #fff;
        }

        .btn-custom {
            background-color: transparent;
            border: 1px solid #fff;
            color: #fff;
            border-radius: 20px;
            padding: 0.5rem 2rem;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 1rem;
            margin-top: 1rem;
        }

        .btn-custom:hover {
            background-color: #fff;
            color: #4e54c8;
        }

        footer {
            color: #ddd;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Reset Password</h1>
        <p>Please check your email for a verification link.</p>

        <form id="loginForm" action="/conPass" method="post">
            @csrf
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            <button type="submit" class="btn btn-custom">Proceed</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
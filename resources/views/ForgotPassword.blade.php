<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://db.onlinewebfonts.com/c/215107c04d97667966f3b627c9e79860?family=Spoof+Trial+Thin"
        rel="stylesheet">
    <style>
    @import url(https://db.onlinewebfonts.com/c/215107c04d97667966f3b627c9e79860?family=Spoof+Trial+Thin);

    @font-face {
        font-family: "Spoof Trial Thin";
        src: url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.eot");
        src: url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.eot?#iefix")format("embedded-opentype"),
            url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.woff2")format("woff2"),
            url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.woff")format("woff"),
            url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.ttf")format("truetype"),
            url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.svg#Spoof Trial Thin")format("svg");
    }

    /* Additional styles for responsiveness */
    body {
        font-family: "Spoof Trial Thin", sans-serif;
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
            background: transparent;
            border-radius: 10px;
            padding: 0px;
            width: 37%;
            height: 50%;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
        }
        
    .btn{
        background-color: transparent;
        color: white;
        border: 2px solid rgba(255, 255, 255, .2);
        border-radius: 20px;
        padding-right: 20px;
        padding-left: 20px;
        margin-left: 190px;
    }


    .btn:hover {
        background-color: white;
        color: black;
    }

    
    .form-control {
        background: transparent;
        border-radius: 20px;
    }

    </style>
</head>

<body>
    <!-- Navigation Bar 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/"><img src="images/logo.png" style="width:200px;"></a>
         Add your navigation links if needed 
    </nav> -->



    <!-- Login Content -->
        <div class="container">
            <div class=" row justify-content-center">

                    <form id="loginForm" action="/verify" method="post" >
                        @csrf <!-- Ensure CSRF token is included -->

                        <header class="py-4 text-center">
                            <h1>Reset Password</h1>
                            <p>Enter your Email Address to reset your account's password.</p>
                        </header>

                        <div class="form-group" style="margin-bottom: 20px;">
                            <input type="email" class="form-control" id="enterEmail" name="enterEmail" placeholder="Email" required>
                        </div>

                        <button type="submit" class="btn">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section
    <footer class="bg-black text-light text-center py-3 fixed-bottom">
        <div class="row">
            <div class="col-md text-left ml-md-5">
                <p><a href="/terms" class="text-light">Terms and Conditions</a></p>
            </div>
            <div class="col-md text-center">
                <p>&copy; 2023 Login Page. All rights reserved.</p>
            </div>
            <div class="col-md text-right mr-md-5">
                <p><a href="https://www.facebook.com/yourpage" class="text-light">Follow us on Facebook</a></p>
            </div>
        </div>
    </footer> -->

    <!-- Bootstrap JS and Popper.js scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
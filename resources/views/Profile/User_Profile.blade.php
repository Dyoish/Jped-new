<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cyber Cartel | Profile</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <!-- Load Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 200px auto;
            padding: 80px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .profile_header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile_header img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .profile_header h2 {
            font-size: 24px;
            margin: 10px 0;
        }

        .profile_header p {
            font-size: 16px;
            color: #6c757d;
        }

        .profile_details {
            margin: 20px 0;
            border-top: 1px solid #dee2e6;
            padding-top: 50px;
        }

        .profile_details p {
            margin: 10px 0;
            font-size: 16px;
        }

        .edit-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 3px 5px;
            background-color: rgba(0, 0, 0, 0.6);
            color: #ffffff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .edit-btn:hover {
            background-color: black;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    @include('Layouts.navbar')

    <div class="container">
        <!-- Profile Header Section -->
        <div class="profile_header">
            <h2>{{ auth()->user()->name }}</h2>
            <p>Edit Profile <a href="my_account/edit" class="edit-btn"><i class='bx bx-edit'></i></a></p>
        </div>

        <!-- Profile Details Section -->
        <div class="profile_details">
            <h4>Profile Details</h4>
            <p><strong>Username:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
        </div>
    </div>


    <!-- Bootstrap JS and Popper.js scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
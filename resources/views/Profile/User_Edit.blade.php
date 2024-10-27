<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="/public">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JPED | Profile | Edit</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Load Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            max-width: 600px;
            margin: 153px auto;
            padding: 60px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-header img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .profile-header h2 {
            margin: 10px 0;
        }

        .profile-header p {
            margin: 0;
            font-size: 14px;
            color: #6c757d;
        }

        .input-group {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #007bff;
            outline: none;
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

        .custom-btn {
            background-color: rgba(0, 0, 0, 0.6);
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        .custom-btn:hover {
            background-color: black;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    @include('Layouts.navbar')

    <div class="container">
        <!-- Profile Header Section -->
        <div class="profile-header">
            <h2>{{ auth()->user()->name }}</h2>
            <p>Edit Profile <a href="my_account/edit" class="edit-btn"><i class='bx bx-edit'></i></a></p>
        </div>
        <hr>
        <br>
        <!-- Profile Details Section -->
        <h4 class="text-center">My Profile</h4>
        <p class="text-center">Manage and protect your account</p>


        <form action="{{ route('user.update-profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="input-group">
                <label for="name" style="font-weight: bold;">Username:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" required />
            </div>

            <div class="input-group">
                <label for="email" style="font-weight: bold;">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required />
            </div>

            <button type="submit" class="btn custom-btn">Save</button>
        </form>
    </div>

    <!-- <footer>
        &copy; 2024 JPED All rights reserved.
    </footer> -->

    <!-- Bootstrap JS and Popper.js scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
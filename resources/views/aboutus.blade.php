<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JPED | About Us</title>
    <link rel="stylesheet" href="dashboard.css">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Load Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Ensure jQuery is loaded first -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            margin: 0;
            overflow-x: hidden;
        }

        h1 {
            font-weight: bold;
        }

        a {
            text-decoration: none;
            font-size: 18px;
            color: inherit;
        }

        main {
            flex: 1;
        }

        .navbar {
            transition: top 0.5s ease;
            /* 0.5s duration for a smooth effect */
        }

        footer {
            margin-top: auto;
        }

        /* Image gallery */
        .gallery-container {
            padding: 40px 0;
        }

        .gallery-item {
            margin-bottom: 30px;
        }

        .gallery-item img {
            border-radius: 10px;
            width: 100%;
            height: auto;
            object-fit: cover;
            transition: transform 0.2s ease-in-out;
        }

        .gallery-item img:hover {
            transform: scale(1.05);
            /* Slight zoom on hover */
        }

        .gallery-title {
            margin-bottom: 20px;
            font-size: 36px;
            font-weight: bold;
            text-align: center;
        }

        .gallery-btn {
            background-color: black;
            /* Default background color */
            color: white;
            /* Text color */
            border-color: black;
            /* Button border color */
            margin: 5px;
        }

        .gallery-btn:hover {
            background-color: #4d9584;
            /* Highlight color on hover */
            color: white;
            /* Keep text white on hover */
        }

        .gallery-btn.active {
            background-color: #4d9584;
            /* Highlight color for active button */
            color: white;
            /* Keep text white */
        }

        .modal-content {

            border-radius: 10px;
            /* Rounded corners for the modal */
        }

        .modal-dialog {
            max-width: 90%;
            /* Set a percentage for responsiveness */
            width: 850px;
            /* Set a fixed width if desired */
        }

        .modal-body {
            display: flex;
            /* Keep elements in a row */
            align-items: center;
            /* Center the items vertically */
            overflow: hidden;
            /* Prevent overflow */
        }

        .modal-img {
            max-width: 60%;
            /* Set width to control space taken by image */
            max-height: 80vh;
            /* Limit height to keep it within modal */
            object-fit: contain;
            /* Maintain aspect ratio */
            margin-right: 20px;
            /* Add some spacing between image and details */
        }

        .modal-description {
            max-width: 45%;
            padding-left: 20px;
        }

        .modal-details {
            max-width: 40%;
            /* Control width of text details */
            overflow-y: auto;
            /* Allow scrolling if content is too tall */
        }

        .modal-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .modal-comments {
            width: 100%;
            /* Ensures comments take the full width of the parent */
        }

        .modal-comments .comment-item {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .header-image {
            background-image: url('images/bg/about (1).png');
            /* Path to your cover image */
            background-size: cover;
            /* Ensures the image covers the entire div */
            background-position: center top;
            /* Center the image horizontally, align it to the top vertically */
            height: 650px;
            /* Set to half of the image height (1080px / 2) */
            width: 100%;
        }

        .body-image {
            background-image: url('images/bg/body.png');
            /* Path to your cover image */
            background-size: cover;
            /* Ensures the image covers the entire div */
            background-position: center top;
            /* Center the image horizontally, align it to the top vertically */
            height: 1400px;
            /* Set to half of the image height (1080px / 2) */
            width: 100%;
        }


        /* CSS to position the new image in the bottom left corner */
        .corner-image {
            position: absolute;
            bottom: -290px;
            /* Adjust the spacing from the bottom */
            left: 90px;
            /* Adjust the spacing from the left */
            width: 57%;
            /* Adjust the size of the image as needed */
            height: auto;
            /* Maintain aspect ratio */
            border-radius: 20px;
        }

        .corner-text {
            margin-left: 900px;
            /* Adds space between image and text */
            flex-grow: 1;
            /* Allows the text to take up remaining space */
            color: #000;
            max-width: 50px;
            /* Prevent text from taking up too much space */
        }

        .corner-text h3,
        .corner-text p {
            margin: 0;
            padding: 5px 0;
        }


        .corner-image-one {
            position: relative;
            bottom: -375px;
            /* Adjust the spacing from the bottom */
            right: -347px;
            /* Adjust the spacing from the left */
            width: 40%;
            /* Adjust the size of the image as needed */
            height: 40%;
            /* Maintain aspect ratio */
            border-radius: 50%;
        }

        .corner-image-two {
            position: relative;
            bottom: -250px;
            /* Adjust the spacing from the bottom */
            right: -450px;
            /* Adjust the spacing from the left */
            width: 75%;
            /* Adjust the size of the image as needed */
            height: 60%;
            /* Maintain aspect ratio */
            border-radius: 20px;

        }

        .corner-text-one {
            position: relative;
            bottom: -270px;
            /* Adjust the spacing from the bottom */
            right: -630px;
            /* Align with corner-image-one */
            color: white;
            /* Text color */

        }

        .corner-text-one p {
            position: relative;
            color: white;
            /* Text color */

        }

        .corner-text-two {
            position: absolute;
            bottom: -130px;
            /* Adjust the spacing from the bottom */
            left: -320px;
            /* Align with corner-image-two */
            color: white;
            /* Text color */
            font-size: 20px;
        }

        .corner-text-two p {
            position: absolute;
            left: 0px;
            /* Align with corner-image-two */
            color: white;
            /* Text color */

        }

        /* Styling for the container with logo, contacts, and services */
        .info-container {
            background-image: url('images/bg/footer.png');
            /* Path to your cover image */
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            margin-top: 900px;
            padding: 20px;
            background-color: #f4f4f4;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .info-container .logo {
            flex: 1;
            text-align: center;
        }

        .info-container .logo img {
            width: 150px;
            /* Adjust the size of your logo as needed */
            height: auto;
        }

        .info-container .contacts,
        .info-container .services {
            flex: 1;
            padding: 0 20px;
        }

        .info-container h3 {
            font-weight: 600;
            margin-bottom: 15px;
            margin-left: 210px;
        }

        .info-container p,
        .info-container li {
            font-size: 16px;
            margin-bottom: 10px;
            margin-left: 210px;
        }

        .info-container ul {
            list-style-type: none;
            padding: 0;
        }

        .info-container li {
            margin-bottom: 8px;
        }

        .services {
            margin-right: 130px;
        }

        .contacts {
            margin-right: -70px;
            margin-top: 50px;
        }

        /* Make it responsive */
        @media (max-width: 768px) {
            .info-container {
                flex-direction: column;
                align-items: center;
            }

            .info-container .logo,
            .info-container .contacts,
            .info-container .services {
                padding: 10px;
                text-align: center;
            }
        }

        .profile-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: -1500px;
            /* Adjust the spacing */
            padding: 20px;
        }

        .profile-item {
            text-align: center;
        }

        .profile-item p {
            color: white;
        }

        .hover-effect {
            position: relative;
        }

        .profile-pic {
            width: 200px;
            /* Set the width for the profile picture */
            height: 200px;
            /* Set the height for the profile picture */
            object-fit: cover;
            /* Ensures the image covers the space */
            border: 10px solid white;
            /* Add a border if desired */

        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    @include('Layouts.navbar')

    <!-- Cover Image Section -->
    <div class="container-fluid p-0 header-image">
    </div>

    <!-- body Image Section -->
    <div class="container-fluid p-0 body-image">
    </div>

    <!-- Profile Picture Section -->
    <div class="profile-container d-flex justify-content-around py-3">
        <!-- Profile 1 -->
        <div class="profile-item">
            <div class="hover-effect">
                <img src="images/profile/josh.jpg" alt="Profile 1" class="profile-pic">
                <div class="hover-text">
                    <p>Josh Dalmacio <br>
                        (Project Manager) <br>
                        Photographer
                    </p>
                </div>
            </div>
        </div>

        <!-- Profile 2 -->
        <div class="profile-item">
            <div class="hover-effect">
                <img src="images/profile/josh.jpg" alt="Profile 2" class="profile-pic">
                <div class="hover-text">
                    <p>Loren Gelido<br>
                        (Front End Developer) <br>
                        Art Director
                    </p>
                </div>
            </div>
        </div>

        <!-- Profile 3 -->
        <div class="profile-item">
            <div class="hover-effect">
                <img src="images/profile/josh.jpg" alt="Profile 3" class="profile-pic">
                <div class="hover-text">
                    <p>Leyanna Sanchez <br>
                        (Full Stack Developer) <br>
                        Production Assistant
                    </p>
                </div>
            </div>
        </div>

        <!-- Profile 4 -->
        <div class="profile-item">
            <div class="hover-effect">
                <img src="images/profile/josh.jpg" alt="Profile 4" class="profile-pic">
                <div class="hover-text">
                    <p>Mark Capinpin <br>
                        (Reseacher) <br>
                        Photographer
                    </p>
                </div>
            </div>
        </div>

        <!-- Profile 5 -->
        <div class="profile-item">
            <div class="hover-effect">
                <img src="images/profile/josh.jpg" alt="Profile 5" class="profile-pic">
                <div class="hover-text">
                    <p>Lester Taluban <br>
                        (Front End Developer) <br>
                        Photographer
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="corner-image">
        <!-- Add image in the bottom left corner -->
        <img src="images/bg/cam.png" alt="Left corner image" class="corner-image">

        <div class="corner-image-one">
            <!-- Add the text above the first image -->
            <div class="corner-text-one">
                <h3>AMAZING TEAM WORK WITH PHOTOGRAPHER</h3>

                <p>JPED is a photography website designed for photographers to showcase their portfolios and engage with
                    clients. It allows photographers to upload, organize, and present their work in a sleek, modern UI.
                </p>
            </div>
            <!-- Image in the bottom right corner -->
            <img src="images/bg/hawal.jpg" alt="Left corner image" class="corner-image-one">
        </div>

        <div class="corner-image-two">
            <!-- Add the text above the second image -->
            <div class="corner-text-two">
                <h3>Capture moments, tell stories.</h3>
                <p>"Photography is the delicate dance of light and shadow, capturing the essence of fleeting moments and
                    rendering them timeless. It is a silent, visual poetry that distills emotions into a frame, letting
                    us glimpse the soul of the world."
                </p>
            </div>
            <!-- Image in the bottom right corner -->
            <img src="images/bg/chair.png" alt="Left corner image" class="corner-image-two">
        </div>
    </div>


    <!-- New container for logo, contacts, and services -->
    <div class="info-container">
        <a class="logo" href="/about">
            <br>
            <br>
            <br>
            <img src="images/blogo.png" alt="About Us Logo"
                style="width: 200px; height: auto; margin-right: -250px; margin-top: -50px;">
        </a>
        <div class="contacts">
            <h3>Contact Us</h3>
            <p>Email: info@jped.com</p>
            <p>Phone: +123-456-7890</p>
            <p>Address: 123 Photography St., Imageland</p>
        </div>
        <div class="services">
            <h3>Our Services</h3>
            <ul>
                <li>Portrait Photography</li>
                <li>Concert Photography</li>
                <li>Cosplay Photography</li>
                <li>Product Photography</li>
                <li>Companion Photography</li>
                <li>Model Photography</li>
            </ul>
        </div>
    </div>


    <!-- Image Preview Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex">
                    <img id="modalImage" class="modal-img" src="" alt="Image Preview">
                    <div class="modal-details ms-4">
                        <h3 id="modalTitle" class="modal-title"></h3>
                        <p id="modalDescription" class="modal-description"></p>
                        <div class="modal-ratings">
                            <strong>Rating:</strong> <span id="modalRating"></span> / 5
                        </div>
                        <div class="modal-comments mt-3">
                            <strong>Comments:</strong>
                            <div id="modalComments"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            // Modal trigger logic
            $('.gallery-item img').click(function () {
                const imgSrc = $(this).attr('src');
                const imgTitle = $(this).data('title');
                const imgDescription = $(this).data('description');
                const imgRating = $(this).data('rating');
                let imgComments = [];
                try {
                    const rawComments = $(this).data('comments');
                    imgComments = typeof rawComments === 'string' ? JSON.parse(rawComments) : rawComments;
                } catch (error) {
                    console.error('Error parsing comments:', error);
                }

                // Set modal content 
                $('#modalImage').attr('src', imgSrc);
                $('#modalTitle').text(imgTitle || 'No title');
                $('#modalDescription').text(imgDescription || 'No description available.');

                // Correctly format the rating
                $('#modalRating').text(imgRating || 'No rating');

                // Populate comments
                let commentsHtml = '';
                imgComments.forEach(comment => {
                    commentsHtml += `<div class="comment-item">${comment}</div>`;
                });
                $('#modalComments').html(commentsHtml || 'No comments');

                // Show the modal
                $('#imageModal').modal('show');
            });
        });
    </script>


    <!-- Scripts -->
    <script>
        let lastScrollTop = 0;
        const navbar = document.querySelector('.navbar');

        window.addEventListener('scroll', function () {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                // Scroll Down - Hide Navbar
                navbar.style.top = "-80px"; // Adjust depending on your navbar's height
            } else {
                // Scroll Up - Show Navbar
                navbar.style.top = "0";
            }
            lastScrollTop = scrollTop;
        });
    </script>
</body>

</html>
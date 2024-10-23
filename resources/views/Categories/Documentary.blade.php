<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JPED | Documentary</title>
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
            padding: 0px 0;
        }


        .gallery-item {
            margin-bottom: 30px;

        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 3 images per row */
            grid-gap: 0;
            /* No gaps between images */
        }

        .gallery-item img {
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
            background-color: transparent;
            /* Default background color */
            color: black;
            /* Text color */
            border-color: transparent;
            /* Button border color */
            margin: 5px;
        }

        .gallery-btn:hover {
            background-color: black;
            border-color: black;
            color: white;
            /* Keep text white on hover */
        }

        .gallery-btn.active {
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
            background-image: url('images/bg/hmpp.jpg');
            /* Path to your cover image */
            background-size: cover;
            /* Ensures the image covers the entire div */
            background-position: center top;
            /* Center the image horizontally, align it to the top vertically */
            height: 540px;
            /* Set to half of the image height (1080px / 2) */
            width: 100%;
        }

        .gallery-btn.active {
            background-color: black;
            color: white;
            border-color: black;

        }

        /* Styling for the container with logo, contacts, and services */
        .info-container {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            margin-top: 400px;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 10px;
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
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    @include('Layouts.navbar')


    <!-- Cover Image Section -->
    <div class="container-fluid p-0 header-image">
    </div>

    <!-- Header Section -->
    <header style="margin-top: 40px;">
        <div class="container" id="contents" style="text-align: center;">
            <h1>JPED</h1>
        </div>
    </header>

    <!-- Image Gallery Section -->
    <section class="gallery-container">
        <div class="container">
            <!-- Category Buttons -->
            <!-- Category Buttons -->
            <div class="gallery-categories text-center">
                <a class="btn btn-primary text-center gallery-btn {{ Request::is('portrait_category') ? 'active' : '' }}"
                    href="/portrait_category">Portraiture</a>
                <a class="btn btn-primary text-center gallery-btn {{ Request::is('concert_category') ? 'active' : '' }}"
                    href="/concert_category">Concert</a>
                <a class="btn btn-primary text-center gallery-btn {{ Request::is('cosplay_category') ? 'active' : '' }}"
                    href="/cosplay_category">Cosplay</a>
                <a class="btn btn-primary text-center gallery-btn {{ Request::is('products_category') ? 'active' : '' }}"
                    href="/products_category">Products</a>
                <a class="btn btn-primary text-center gallery-btn {{ Request::is('companion_category') ? 'active' : '' }}"
                    href="/companion_category">Companion</a>
                <a class="btn btn-primary text-center gallery-btn {{ Request::is('model_category') ? 'active' : '' }}"
                    href="/model_category">Model</a>
                <a class="btn btn-primary text-center gallery-btn {{ Request::is('documentary_category') ? 'active' : '' }}"
                    href="/documentary_category">Documentary</a>
                <br>
                <br>

                <div class="row">
                    <!-- Gallery item 1 -->
                    <div class="col-md-4 col-sm-6 gallery-item">
                        <img src="images/gallery/chaven.jpg" alt="Gallery Image 1" class="img-fluid" data-title="Kape"
                            data-description="masarap mag kape" data-rating="4.5"
                            data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                    </div>
                    <!-- Gallery item 2 -->
                    <div class="col-md-4 col-sm-6 gallery-item">
                        <img src="images/gallery/ibons.jpg" alt="Gallery Image 2" class="img-fluid" data-title="Kape"
                            data-description="A serene portrait of a person enjoying coffee." data-rating="4.5"
                            data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                    </div>
                    <!-- Gallery item 3 -->
                    <div class="col-md-4 col-sm-6 gallery-item">
                        <img src="images/gallery/france.jpg" alt="Gallery Image 3" class="img-fluid" data-title="Kape"
                            data-description="A serene portrait of a person enjoying coffee." data-rating="4.5"
                            data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                    </div>
                    <!-- Gallery item 4 -->
                    <div class="col-md-4 col-sm-6 gallery-item" style='margin-top: -200px;'>
                        <img src="images/gallery/gi (1).jpg" alt="Gallery Image 4" class="img-fluid" data-title="Kape"
                            data-description="A serene portrait of a person enjoying coffee." data-rating="4.5"
                            data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                    </div>
                    <!-- Gallery item 5 -->
                    <div class="col-md-4 col-sm-6 gallery-item">
                        <img src="images/gallery/bino.jpg" alt="Gallery Image 5" class="img-fluid" data-title="Kape"
                            data-description="A serene portrait of a person enjoying coffee." data-rating="4.5"
                            data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                    </div>
                    <!-- Gallery item 6 -->
                    <div class="col-md-4 col-sm-6 gallery-item" style='margin-top: -200px;'>
                        <img src="images/gallery/rafa.jpg" alt="Gallery Image 6" class="img-fluid" data-title="Kape"
                            data-description="A serene portrait of a person enjoying coffee." data-rating="4.5"
                            data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                    </div>
                    <!-- Gallery item 7 -->
                    <div class="col-md-4 col-sm-6 gallery-item" style='margin-top: -200px;'>
                        <img src="images/gallery/cato.jpg" alt="Gallery Image 6" class="img-fluid" data-title="Kape"
                            data-description="A serene portrait of a person enjoying coffee." data-rating="4.5"
                            data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                    </div>
                    <!-- Gallery item 8 -->
                    <div class="col-md-4 col-sm-6 gallery-item">
                        <img src="images/gallery/katsu.jpg" alt="Gallery Image 6" class="img-fluid" data-title="Kape"
                            data-description="A serene portrait of a person enjoying coffee." data-rating="4.5"
                            data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                    </div>
                    <!-- Gallery item 9 -->
                    <div class="col-md-4 col-sm-6 gallery-item" style='margin-top: -200px;'>
                        <img src="images/gallery/cat.jpg" alt="Gallery Image 6" class="img-fluid" data-title="Kape"
                            data-description="A serene portrait of a person enjoying coffee." data-rating="4.5"
                            data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                    </div>
                </div>
            </div>
    </section>

    <!-- New container for logo, contacts, and services -->
    <div class="info-container">
        <a class="logo" href="/about">
            <br>
            <br>
            <br>
            <h3>About Us</h3>
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
                <li>Documentary Photography</li>
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
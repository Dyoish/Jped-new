<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JPED | Portrait</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="icon" href="images/J.png" sizes="50x50" type="image/png"> <!-- Favicon link -->
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
            max-width: 100%;
            padding-left: 0px;
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
            background-image: url('images/products/9.png');
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
            background-image: url('images/bg/footer.png');
            /* Path to your cover image */
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            margin-top: 40px;
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
            margin-top: 10px;
        }

        .contacts {
            margin-right: -100px;
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

                <br>
                <br>

                <div class="row">
                    <!-- Gallery item 1 -->
                    <div class="col-md-4 col-sm-6 gallery-item">
                        <img src="images/products/captwo.jpg" alt="Gallery Image 1" class="img-fluid"
                            data-title=" 'KEEP GROWING' DADHAT "
                            data-description="Letting my hat do the talking while I enjoy the journey."
                            data-rating="4.9"
                            data-comments='["This image showcases the product’s beauty perfectly—amazing work!"]'>
                    </div>
                    <!-- Gallery item 2 -->
                    <div class="col-md-4 col-sm-6 gallery-item">
                        <img src="images/products/alltri.jpg" alt="Gallery Image 2" class="img-fluid"
                            data-title="Summer Collection"
                            data-description="'Keep Growing' - A Summer Collection by Exceed Clothing Co."
                            data-rating="4.8"
                            data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                    </div>
                    <!-- Gallery item 3 -->
                    <div class="col-md-4 col-sm-6 gallery-item">
                        <img src="images/products/ranger.jpg" alt="Gallery Image 3" class="img-fluid"
                            data-title="Ranger Hat"
                            data-description="Every hat has a story; mine just happens to be a bestseller."
                            data-rating="4.9" data-comments='["Amazing lighting!", "I love the mood of this shot."]'>
                    </div>
                    <!-- Gallery item 4 -->
                    <div class="col-md-4 col-sm-6 gallery-item">
                        <img src="images/products/tote.jpg" alt="Gallery Image 1" class="img-fluid"
                            data-title="'Keep Growing' Tote Bag"
                            data-description="With this tote by my side, I’m always ready for life’s next chapter."
                            data-rating="4.9"
                            data-comments='["This shot captures the essence of the product beautifully—love it!"]'>
                    </div>
                    <!-- Gallery item 5 -->
                    <div class="col-md-4 col-sm-6 gallery-item" style='margin-top: -20px;'>
                        <img src="images/products/shirtt.jpg" alt="Gallery Image 1" class="img-fluid"
                            data-title="'GROWTH' Tee"
                            data-description="Every shirt holds a story; this one is a chapter of my journey."
                            data-rating="4.9"
                            data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                    </div>
                    <!-- Gallery item 6 -->
                    <div class="col-md-4 col-sm-6 gallery-item">
                        <img src="images/products/crop.jpg" alt="Gallery Image 1" class="img-fluid"
                            data-title="'GROWTH' Racer Back Tee"
                            data-description="Short and sweet, just like my summer vibes." data-rating="4.8"
                            data-comments='["Amazing lighting!", "I love the mood of this shot."]'>
                    </div>
                    <!-- Gallery item 7 -->
                    <div class="col-md-4 col-sm-6 gallery-item">
                        <img src="images/products/brand.jpg" alt="Gallery Image 1" class="img-fluid"
                            data-title="Hibiscus Logo"
                            data-description="Collecting moments, one piece of merch at a time!" data-rating="4.8"
                            data-comments='["Beautiful composition!", "I love the mood of this shot."]'>
                    </div>
                    <!-- Gallery item 8 -->
                    <div class="col-md-4 col-sm-6 gallery-item" style='margin-top: -20px;'>
                        <img src="images/products/alltwo.jpg" alt="Gallery Image 1" class="img-fluid"
                            data-title="Summer Collection"
                            data-description="'Keep Growing' - A Summer Collection by Exceed Clothing Co."
                            data-rating="4.9"
                            data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                    </div>
                    <!-- Gallery item 9 -->
                    <div class="col-md-4 col-sm-6 gallery-item">
                        <img src="images/products/toap.jpg" alt="Gallery Image 1" class="img-fluid"
                            data-title="Tote Cap"
                            data-description="Where style meets passion—always ready to represent." data-rating="4.5"
                            data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                    </div>

                </div>
            </div>
    </section>

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

                            <!-- New Comments Container -->
                            <div class="new-comments-container mt-3">
                                <strong>Your Submitted Comments:</strong>
                                <div id="newComments"></div>
                            </div>
                        </div>

                        <!-- Rating System -->
                        <div class="rating mt-3">
                            <strong>Your Rating:</strong>
                            <div>
                                <input type="radio" id="star5" name="rating" value="5">
                                <label for="star5">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4">
                                <label for="star4">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3">
                                <label for="star3">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2">
                                <label for="star2">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1">
                                <label for="star1">1 star</label>
                            </div>
                        </div>

                        <!-- Comment Input -->
                        <div class="comment-input mt-3">
                            <strong>Your Comment:</strong>
                            <textarea id="commentText" class="form-control" rows="3"
                                placeholder="Write your comment here..."></textarea>
                        </div>
                        <br>

                        <!-- Submit Button -->
                        <button id="submitComment" class="btn"
                            style="background-color: gray; color: white; border: none; transition: background-color 0.3s;">Submit</button>
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


        document.addEventListener('DOMContentLoaded', function () {
            const modalImage = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            const modalDescription = document.getElementById('modalDescription');
            const modalRating = document.getElementById('modalRating');
            const modalComments = document.getElementById('modalComments');
            const newComments = document.getElementById('newComments'); // New container for submitted comments
            const submitComment = document.getElementById('submitComment');
            const commentText = document.getElementById('commentText');

            // Load comments from localStorage
            const loadComments = () => {
                const savedComments = JSON.parse(localStorage.getItem('comments')) || {};
                const currentImageTitle = modalTitle.textContent; // Assuming you set this when opening the modal
                modalComments.innerHTML = savedComments[currentImageTitle]
                    ? savedComments[currentImageTitle].map(comment => `<p>${comment}</p>`).join('')
                    : 'No comments yet.';

                // Load the new comments into newComments div
                newComments.innerHTML = savedComments[currentImageTitle]
                    ? savedComments[currentImageTitle].map(comment => `<p>${comment}</p>`).join('')
                    : 'No comments yet.';
            };

            // Set image details and load comments
            const setImageDetails = (img) => {
                modalImage.src = img.src;
                modalTitle.textContent = img.getAttribute('data-title');
                modalDescription.textContent = img.getAttribute('data-description');
                modalRating.textContent = img.getAttribute('data-rating');
                loadComments();
            };

            // Event listener for comment submission
            submitComment.addEventListener('click', function () {
                const currentImageTitle = modalTitle.textContent;

                // Retrieve existing comments or initialize an array
                const savedComments = JSON.parse(localStorage.getItem('comments')) || {};
                if (!savedComments[currentImageTitle]) {
                    savedComments[currentImageTitle] = [];
                }

                // Add new comment
                if (commentText.value.trim() !== '') { // Check if the comment is not empty
                    savedComments[currentImageTitle].push(commentText.value.trim());
                    localStorage.setItem('comments', JSON.stringify(savedComments));
                    loadComments(); // Load comments after adding a new one
                    commentText.value = ''; // Clear the input after submission
                }
            });

            // Assuming you have a way to open the modal and set the image details
            // Here is an example for attaching an event listener to the images in the gallery
            document.querySelectorAll('.gallery-item img').forEach(img => {
                img.addEventListener('click', function () {
                    setImageDetails(this);
                    // Show the modal (using Bootstrap's modal)
                    var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
                    myModal.show();
                });
            });
        });

    </script>
</body>

</html>
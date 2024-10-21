<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>J.PED</title>
    <link rel="stylesheet" href="dashboard.css">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://db.onlinewebfonts.com/c/215107c04d97667966f3b627c9e79860?family=Spoof+Trial+Thin"
        rel="stylesheet">

    <!-- Ensure jQuery is loaded first -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


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

    body {
        font-family: "Spoof Trial Thin", sans-serif;
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
    transition: top 0.5s ease; /* 0.5s duration for a smooth effect */
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
        background-color: black;  /* Default background color */
        color: white;             /* Text color */
        border-color: black;      /* Button border color */
        margin: 5px;
    }

    .gallery-btn:hover {
        background-color: #4d9584; /* Highlight color on hover */
        color: white;              /* Keep text white on hover */
    }

    .gallery-btn.active {
        background-color: #4d9584; /* Highlight color for active button */
        color: white;              /* Keep text white */
    }

    .modal-content {
            
        border-radius: 10px; /* Rounded corners for the modal */
    }

    .modal-dialog {
         max-width: 90%; /* Set a percentage for responsiveness */
        width: 850px; /* Set a fixed width if desired */
    }

    .modal-body {
        display: flex; /* Keep elements in a row */
        align-items: center; /* Center the items vertically */
        overflow: hidden; /* Prevent overflow */
    }

    .modal-img {
        max-width: 60%; /* Set width to control space taken by image */
        max-height: 80vh; /* Limit height to keep it within modal */
        object-fit: contain; /* Maintain aspect ratio */
        margin-right: 20px; /* Add some spacing between image and details */
    }

    .modal-description {
        max-width: 45%;
        padding-left: 20px;
    }

    .modal-details {
        max-width: 40%; /* Control width of text details */
        overflow-y: auto; /* Allow scrolling if content is too tall */
    }

    .modal-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .modal-comments {
        width: 100%; /* Ensures comments take the full width of the parent */
    }

    .modal-comments .comment-item {
        margin-bottom: 10px;
        padding: 10px; 
        border: 1px solid #ddd; 
        border-radius: 5px; 
        background-color: #f9f9f9; 
    }

    .header-image {
    background-image: url('images/bg/hmpp.jpg'); /* Path to your cover image */
    background-size: cover; /* Ensures the image covers the entire div */
    background-position: center top; /* Center the image horizontally, align it to the top vertically */
    height: 100%; /* Set to half of the image height (1080px / 2) */
    width: 100%;  
    }

    /* CSS to position the new image in the bottom left corner */
    .corner-image {
        position: absolute;
        bottom: -400px; /* Adjust the spacing from the bottom */
        left: 30px;   /* Adjust the spacing from the left */
        width: 68%; /* Adjust the size of the image as needed */
        height: auto; /* Maintain aspect ratio */
    }

    .corner-text {
    margin-left: 900px; /* Adds space between image and text */
    flex-grow: 1; /* Allows the text to take up remaining space */
    color: #000;
    max-width: 50px; /* Prevent text from taking up too much space */
    }

    .corner-text h3, .corner-text p {
        margin: 0;
        padding: 5px 0;
    }

    .corner-image-one {
        position: relative;
        bottom: -248px; /* Adjust the spacing from the bottom */
        right: -450px;   /* Adjust the spacing from the left */
        width: 51%; /* Adjust the size of the image as needed */
        height: 50%; /* Maintain aspect ratio */
    }

    .corner-image-two {
        position: relative;
        bottom: -100px; /* Adjust the spacing from the bottom */
        right: -650px;   /* Adjust the spacing from the left */
        width: 50%; /* Adjust the size of the image as needed */
        height: 60%; /* Maintain aspect ratio */
    }

    .corner-text-one {
        position: relative;
        bottom: -200px; /* Adjust the spacing from the bottom */
        right: -500px; /* Align with corner-image-one */
        color: #000; /* Text color */

    }

    .corner-text-two {
        position: absolute;
        bottom: -200px; /* Adjust the spacing from the bottom */
        right: -350px; /* Align with corner-image-two */
        color: #000; /* Text color */
        font-size: 20px;
    }

    
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    @include('Layouts.navbar')


    <!-- Cover Image Section -->
    <div class="container-fluid p-0 header-image">
    </div>

    <div class="corner-image">
    <!-- Add image in the bottom left corner -->
    <img src="images/bg/gi.jpg" alt="Left corner image" class="corner-image">

    <div class="corner-image-one">
        <!-- Add the text above the first image -->
        <div class="corner-text-one">
        <h3>AMAZING TEAM WORK WITH PHOTOGRAPHER</h3>
        <br>
        <p>JPED is a photography website designed for photographers to showcase their portfolios and engage with clients. It allows photographers to upload, organize, and present their work in a sleek, modern UI.</p>
        </div>
        <!-- Image in the bottom right corner -->
        <img src="images/bg/gi.jpg" alt="Left corner image" class="corner-image-one">
    </div>

    <div class="corner-image-two">
        <!-- Add the text above the second image -->
        <div class="corner-text-two">
             <p>"Taking an image, freezing a moment, reveals how rich reality truly is."</p>
        </div>
        <!-- Image in the bottom right corner -->
        <img src="images/bg/gi.jpg" alt="Left corner image" class="corner-image-two">
    </div>
</div>
</div>


    <!-- Header Section 
    <header style="margin-top: 70px;">
        <div class="container" id="contents" style="text-align: center;">
            <h1>J.PED</h1> 
        </div>
    </header>-->

    <!-- Image Gallery Section -->
    <!-- <section class="gallery-container"> -->
        <!-- <div class="container"> -->
            <!-- Category Buttons -->
                <!-- <div class="gallery-categories text-center">
                    <a class="btn btn-primary text-center gallery-btn" href="/portrait_category">Portraiture</a>
                    <a class="btn btn-primary text-center gallery-btn" href="/concert_category">Concert</a>
                    <a class="btn btn-primary text-center gallery-btn" href="/cosplay_category">Cosplay</a>
                    <a class="btn btn-primary text-center gallery-btn" href="/products_category">Products</a>
                    <a class="btn btn-primary text-center gallery-btn" href="/companion_category">Companion</a>
                    <a class="btn btn-primary text-center gallery-btn" href="/model_category">Model</a>
                    <a class="btn btn-primary text-center gallery-btn" href="/documentary_category">Documentary</a>                    
                <br> -->
                <!-- <br>
            <div class="row"> -->
                <!-- Gallery item 1 -->
                <!-- <div class="col-md-4 col-sm-6 gallery-item">
                <img src="images/portraits/kape.jpg" alt="Gallery Image 1" class="img-fluid"
                data-title="Kape" 
                data-description="masarap mag kape" 
                data-rating="4.5"  
                data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div> -->
                <!-- Gallery item 2 -->
                <!-- <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/portraits/DSC_0375_1 (1).jpg" alt="Gallery Image 2" class="img-fluid" data-title="Kape" 
                data-description="A serene portrait of a person enjoying coffee." 
                data-rating="4.5" 
                data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div> -->
                <!-- Gallery item 3 -->
                <!-- <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/events/no2.jpg" alt="Gallery Image 3" class="img-fluid" data-title="Kape" 
                data-description="A serene portrait of a person enjoying coffee." 
                data-rating="4.5" 
                data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div> -->
                <!-- Gallery item 4 -->
                <!-- <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/portraits/DSC_0176 (5).jpg" alt="Gallery Image 4" class="img-fluid" data-title="Kape" 
                data-description="A serene portrait of a person enjoying coffee." 
                data-rating="4.5" 
                data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div> -->
                <!-- Gallery item 5 -->  
                <!-- <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/portraits/DSC_0159.jpg" alt="Gallery Image 5" class="img-fluid" data-title="Kape" 
                        data-description="A serene portrait of a person enjoying coffee." 
                        data-rating="4.5" 
                        data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div>  -->
                <!-- Gallery item 6 -->
                <!-- <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/events/DSC_0301.jpg" alt="Gallery Image 6" class="img-fluid" data-title="Kape" 
     data-description="A serene portrait of a person enjoying coffee." 
     data-rating="4.5" 
     data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div> -->
            <!-- </div>
        </div>
    </section> -->

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

        window.addEventListener('scroll', function() { 
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

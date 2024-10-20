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
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-body {
            display: flex;
        }

        .modal-img {
            max-width: 1280px; 
            max-height: 800px; 
            object-fit: contain; 
        }

        .modal-description {
            max-width: 45%;
            padding-left: 20px;
        }

    </style>
</head>

<body>
    <!-- Navigation Bar -->
    @include('Layouts.navbar')
    <br>

    <!-- Header Section -->
    <header style="margin-top: 70px;">
        <div class="container" id="contents" style="text-align: center;">
            <h1>J.PED</h1> 
        </div>
    </header>

    <!-- Image Gallery Section -->
    <section class="gallery-container">
        <div class="container">
            <!-- Category Buttons -->
                <div class="gallery-categories text-center">
                    <a class="btn btn-primary text-center gallery-btn" href="/portrait_category">Portraits</a>
                    <a class="btn btn-primary text-center gallery-btn" href="/events_category">Events</a>
                    <a class="btn btn-primary text-center gallery-btn" href="/street_category">Street</a>
                    <!-- <a class="btn btn-primary text-center gallery-btn" href="/ram_category">Model</a>
                    <a class="btn btn-primary text-center gallery-btn" href="/gpu_category">Products</a> -->
                </div>
                <br>
            <div class="row">
                <!-- Gallery item 1 -->
                <div class="col-md-4 col-sm-6 gallery-item">
                <img src="images/portraits/kape.jpg" alt="Gallery Image 1" class="img-fluid"
     data-title="Kape" 
     data-description="masarap mag kape" 
     data-rating="4.5" 
     data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div>
                <!-- Gallery item 2 -->
                <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/portraits/DSC_0375_1 (1).jpg" alt="Gallery Image 2" class="img-fluid" data-title="Kape" 
     data-description="A serene portrait of a person enjoying coffee." 
     data-rating="4.5" 
     data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div>
                <!-- Gallery item 3 -->
                <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/events/no2.jpg" alt="Gallery Image 3" class="img-fluid" data-title="Kape" 
     data-description="A serene portrait of a person enjoying coffee." 
     data-rating="4.5" 
     data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div>
                <!-- Gallery item 4 -->
                <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/portraits/DSC_0176 (5).jpg" alt="Gallery Image 4" class="img-fluid" data-title="Kape" 
     data-description="A serene portrait of a person enjoying coffee." 
     data-rating="4.5" 
     data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div>
                <!-- Gallery item 5 -->
                <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/portraits/DSC_0159.jpg" alt="Gallery Image 5" class="img-fluid" data-title="Kape" 
     data-description="A serene portrait of a person enjoying coffee." 
     data-rating="4.5" 
     data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div>
                <!-- Gallery item 6 -->
                <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/events/DSC_0301.jpg" alt="Gallery Image 6" class="img-fluid" data-title="Kape" 
     data-description="A serene portrait of a person enjoying coffee." 
     data-rating="4.5" 
     data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Preview Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="modalImage" class="modal-img" src="" alt="Image Preview">
                    <div class="modal-details">
                        <h3 id="modalTitle" class="modal-title"></h3>
                        <p id="modalDescription" class="modal-description"></p>
                        <div class="modal-ratings"><strong>Rating:</strong><span id="modalRating"></span></div>
                        <div class="modal-comments"><strong>Comments:</strong><div id="modalComments"></div></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                $('#modalRating').text(imgRating ? imgRating + " / 5" : 'No rating');

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


    <!-- Footer Section
    @include('Layouts.footer2') -->

    <!-- Scripts -->
    <script>
    // Automatic slideshow
    document.addEventListener("DOMContentLoaded", function() {
        const slideContainer = document.querySelector(".slide-images");
        const slideImages = document.querySelector(".slide-images");
        let currentIndex = 0;

        function showSlide(index) {
            const translateValue = -index * 100 + "%";
            slideImages.style.transform = "translateX(" + translateValue + ")";
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % 5;
            showSlide(currentIndex);
        }

        setInterval(nextSlide, 5000);
    });

    $(document).ready(function() {
        var previousScroll = 0;

        // Listen for the scroll event
        $(window).scroll(function() {
            var currentScroll = $(this).scrollTop();
            var scrollingDown = currentScroll > previousScroll;

            if (currentScroll > 0) {
                if (scrollingDown) {
                    $('.navbar').addClass('navbar-hidden');
                } else if (currentScroll < 50) {
                    $('.navbar').removeClass('navbar-hidden');
                }
            }

            previousScroll = currentScroll;
        });
    });
    
    </script>
<!-- trial -->


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

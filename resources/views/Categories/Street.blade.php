<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cyber Cartel | Chassis</title>
    <link rel="stylesheet" href="dashboard.css">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://db.onlinewebfonts.com/c/215107c04d97667966f3b627c9e79860?family=Spoof+Trial+Thin"
        rel="stylesheet">

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
        font-family: "Spoof Trial Thin";
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
        background-color: #ffffff;
        overflow-x: hidden;
    }

    main {
        flex: 1;
    }

    footer {
        flex-shrink: 0;
        margin-top:auto;
    }

    .slider-frame {
        overflow: hidden;
        max-width: 100%;
        margin-top: 20px;
    }

    .slide-images {
        display: flex;
        flex-direction: row;
        transition: transform 0.5s ease-in-out;
    }

    .img-container {
        width: 100%;
        /* Adjust the width as needed */
        box-sizing: border-box;
        flex: 0 0 auto;
        text-align: center;
    }

    #pics {
        max-width: 100%;
        /* Set max-width to 100% to ensure it doesn't exceed its container */
        height: auto;
        /* Allow the height to adjust proportionally */
        display: block;
        /* Remove any default inline styles that may affect sizing */
        margin: 0 auto;
    }

    .category_portrait {
        color: #f8f8f8;
        background-color: #000000;
    }

    .img-container img {
        width: 75vw;
        /* Make images responsive */
        height: 500px;
        /* Set a fixed height for all images */
        object-fit: cover;
        /* Ensure images cover the container without stretching */
        border: 1px solid #ddd;
        display: inline-block;
    }

    .card {
        transition: transform 0.1s ease-in-out;
    }

    .card .card-body {
        border-radius: 0px 0px 30px 30px;
    }

    .card:hover {
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        transform: scale(1.05);
        /* Adjust the scale factor as needed */
    }

    .images {
        width: 10px;
        height: 10px;
    }

    .navbar-brand img {
        transition: transform 0.3s ease-in-out;
        /* Apply the transition to the transform property */
    }

    .navbar-brand img:hover {
        transform: scale(1.1);
        /* Increase the scale on hover */
    }

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
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    @include('Layouts.navbar')

    <br>
    <!-- Dashboard Content -->
    <br>
    <header style="margin-top: 45px;">
        <div class="container" id="contents" style="text-align: center;">
            <h1>J.PED</h1> 
        </div>
    </header>

    <div class="container mt-1">
        <div class="row">
            <div class="container" id="contents">
            <header class="d-flex justify-content-center align-items-center text-center" style="margin-bottom: -50px;">
                <h2>
                    <p>Street</p>
                </h2>
            </header>
            </div>
        </div>
    </div>

    <!-- Image Gallery Section -->
    <section class="gallery-container">
        <div class="container">
            <!-- Category Buttons -->
                <div class="gallery-categories text-center">
                    <a class="btn btn-primary text-center gallery-btn" href="/portrait_category">Portraits</a>
                    <a class="btn btn-primary text-center gallery-btn" href="/events_category">Events</a>
                    <a class="btn btn-primary text-center gallery-btn" href="/motherboard_category">Street</a>
                    <!-- <a class="btn btn-primary text-center gallery-btn" href="/ram_category">Model</a>
                    <a class="btn btn-primary text-center gallery-btn" href="/gpu_category">Products</a> -->
                </div>
                <br>
            <div class="row">
                <!-- Gallery item 1 -->
                <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/portraits/DSC_0159.jpg" alt="Gallery Image 1" class="img-fluid"  data-title="Kape" 
     data-description="A serene portrait of a person enjoying coffee." 
     data-rating="4.5" 
     data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div>
                <!-- Gallery item 2 -->
                <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/portraits/DSC_0105 (1).jpg" alt="Gallery Image 2" class="img-fluid" data-title="Kape" 
     data-description="A serene portrait of a person enjoying coffee." 
     data-rating="4.5" 
     data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div>
                <!-- Gallery item 3 -->
                <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/portraits/DSC_0176 (5).jpg" alt="Gallery Image 3" class="img-fluid" data-title="Kape" 
     data-description="A serene portrait of a person enjoying coffee." 
     data-rating="4.5" 
     data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div>
                <!-- Gallery item 4 -->
                <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/portraits/DSC_0105 (1).jpg" alt="Gallery Image 4" class="img-fluid" data-title="Kape" 
     data-description="A serene portrait of a person enjoying coffee." 
     data-rating="4.5" 
     data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div>
                <!-- Gallery item 5 -->
                <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/portraits/DSC_0176 (5).jpg" alt="Gallery Image 5" class="img-fluid" data-title="Kape" 
     data-description="A serene portrait of a person enjoying coffee." 
     data-rating="4.5" 
     data-comments='["Beautiful composition!", "Amazing lighting!", "I love the mood of this shot."]'>
                </div>
                <!-- Gallery item 6 -->
                <div class="col-md-4 col-sm-6 gallery-item">
                    <img src="images/portraits/DSC_0105 (1).jpg" alt="Gallery Image 6" class="img-fluid" data-title="Kape" 
     data-description="A serene portrait of a person enjoying coffee." 
     data-rating="4.5" 
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


    <!-- Footer Section 
    @include('Layouts.footer2')-->

    
</body>

</html>
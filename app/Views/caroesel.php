<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMyShow Clone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .carousel-inner img {
            height: 300px; /* Adjust this value to your desired height */
            object-fit:cover; /*Ensure the image covers the area */
        }

    </style>
</head>

<body>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner mt-3 mx-auto" style="background-color:#b3b2ad; border-radius:20px;width:94%">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="https://static0.srcdn.com/wordpress/wp-content/uploads/2023/11/greatest-movies-of-all-time.jpg"
                    class="d-block mx-auto w-100" alt="...">
            </div>
            <div class="carousel-item a" data-bs-interval="10000">
                <img src="https://static.moviecrow.com/marquee/may-2021-movies-on-netflix-disney-plus-hotstar-zee-5-amazon-prime-video/185529_thumb_665.jpg"
                    class="d-block mx-auto w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="10000">
                <img src="https://i.ytimg.com/vi/Q1NKMPhP8PY/maxresdefault.jpg"
                    class="d-block mx-auto w-100" alt="...">
            </div>
            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</body>

</html>

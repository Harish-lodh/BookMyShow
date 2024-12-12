<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMyShow Clone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .select2-container {
        width: 100% !important; 
        }

      
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <?php include 'navbar.php'; ?>
    <?php include 'assests/alert.php'; ?>
    <div class="container mt-3">
    <div class="row justify-content-center mb-4">
        <div class="col-md-6 d-flex justify-content-between align-items-center">
            <select id="movie-select" class="form-select js-example-basic-single w-50">
                <option value="" disabled selected>Search for a movie...</option>
                <?php foreach ($data as $movie): ?>
                    <option value="<?= htmlspecialchars($movie['moviename']) ?>"><?= htmlspecialchars($movie['moviename']) ?></option>
                <?php endforeach; ?>
            </select>
            <button id="searchBtn" class="btn btn-success ms-3 h-75 d-flex align-items-center justify-content-center">Search</button>

        </div>
    </div>
</div>

  

    <!-- Carousel -->

    <?php include 'caroesel.php'; ?>

    <!-- Movie Listings -->

    <div class="container mt-3">
        <div class="row">
            <?php foreach ($data as $movie): ?>
                <div class="col-md-3 mb-4 d-flex flex-column rounded" style="width: 18rem;">
                    <div class="card">
                        <img src="/getimg/<?= $movie['img'] ?>" style="height: 250px;background-size:cover" class="card-img-top" alt="<?= htmlspecialchars($movie['moviename']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($movie['moviename']) ?></h5>
                            <p class="card-text">Genre: <?= htmlspecialchars($movie['genre']) ?></p>
                            <p class="card-text">Language: <?= htmlspecialchars($movie['language']) ?></p>
                            <p class="card-text">Release Date: <?= htmlspecialchars($movie['release_date']) ?></p>
                            <p class="card-text">Duration: <?= htmlspecialchars($movie['duration']) ?></p>
                            <p class="card-text text-success fw-bold">Price: <?= htmlspecialchars($movie['price']) ?> <i class="fa-solid fa-money-bill"></i></p>
                            <a href="/slot_view/<?= $movie['id'] ?>"><button class="btn btn-secondary">BookMyShow</button></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('.js-example-basic-single').select2();

            // Handle search button click
            $('#searchBtn').on('click', function() {
                var selectedMovie = $('#movie-select').val();
                if (selectedMovie) {
                    window.location.href = '?search=' + encodeURIComponent(selectedMovie);
                } else {
                    alert('Please select a movie');
                }
            });
        });
    </script>
</body>

</html>
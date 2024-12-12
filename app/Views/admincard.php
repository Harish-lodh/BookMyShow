<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
     
    </style>
</head>

<body>
     
    <div class="container mt-5">
    <a  href="/insert"><button type="button"  class="btn btn-danger mb-3">Insert movie</button></a>

    <div class="row">
        <?php foreach ($data as $movie): ?>
            
            <div class="col-md-3 mb-4 d-flex flex-column rounded " style="width: 18rem;">
                <div class="card">
                    <img src="/getimg/<?= $movie['img'] ?>" style="height: 250px;background-size:cover" class="card-img-top" alt="<?= $movie['moviename'] ?>">
                    <div class="card-body ">
                        <h5 class="card-title"><?= $movie['moviename'] ?></h5>
                        <p class="card-text">Genre: <?= $movie['genre'] ?></p>
                        <p class="card-text">Language: <?= $movie['language'] ?></p>
                        <p class="card-text">Release Date: <?= $movie['release_date'] ?></p>
                        <p class="card-text">Duration: <?= $movie['duration'] ?></p>
                        <p class="card-text text-success fw-bold">Price: <?= $movie['price'] ?></p>
                        <a  class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="fetchUserData(<?= $movie['id'] ?>)">Update</a>
                        <a href="/delete/<?= $movie['id'] ?>" class="btn btn-danger mt-2">Delete</a>
                    </div>
                </div>
            
            </div>
        <?php endforeach; ?>
            </div>
    </div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form id="updateForm"  method="post" >
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">movies name</label>
                        <input type="text" class="form-control" id="name" name="moviename">
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">genre</label>
                        <input type="text" class="form-control" id="genre" name="genre">
                    </div>
                    <div class="mb-3">
                        <label for="language" class="form-label">language</label>
                        <input type="text" class="form-control" id="language" name="language">

                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">release_date</label>
                        <input type="date" class="form-control" id="date" name="release_date" >
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="datetime" class="form-control" id="duration" name="duration">
                    </div>
                    <div class="mb-3">
                        <label for="quality" class="form-label">Quality</label>
                        <input type="text" class="form-control" id="quality" name="quality">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function fetchUserData(id) {
            fetch(`fetch/${id}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // Populate the modal with user data
                    document.getElementById('name').value = data.moviename;
                    document.getElementById('genre').value = data.genre;
                    document.getElementById('language').value = data.language;
                    document.getElementById('date').value = data.release_date;
                    document.getElementById('quality').value=data.quality;
                    document.getElementById('duration').value=data.duration;
                    document.getElementById('price').value=data.price;
                    document.getElementById('updateForm').action = `/update/${data.id}`;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<form action="/store" method="post" enctype="multipart/form-data" class="w-50 mx-auto mt-5">
  <div class="mb-2">
    <label for="img" class="form-label">Img</label>
    <input type="file" class="form-control" id="img" name="img">
  </div>
  <div class="mb-2">
    <label for="moviename" class="form-label">Movie</label>
    <input type="text" class="form-control" id="moviename" name="moviename">
  </div>
  <div class="mb-2">
    <label class="form-label" for="genre">Genre</label>
    <input type="text" class="form-control" id="genre" name="genre">
  </div>
  <div class="mb-2">
    <label for="language" class="form-label">Language</label>
    <input type="text" class="form-control" id="language" name="language">
  </div>
  <div class="mb-2">
    <label for="date" class="form-label">Release Date</label>
    <input type="date" class="form-control" id="date" name="release_date">
  </div>
  <div class="mb-2">
    <label for="duration" class="form-label">Duration</label>
    <input type="time" class="form-control" id="duration" name="duration">
  </div>
  <div class="mb-2">
    <label for="quality" class="form-label">Video Quality</label>
    <input type="text" class="form-control" id="quality" name="quality">
  </div>
  <div class="mb-2">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" id="price" name="price">
  </div>
  <button type="submit" class="btn btn-success">Insert Movie</button>
</form>


</body>
</html>
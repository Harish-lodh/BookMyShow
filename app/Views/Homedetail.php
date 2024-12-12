<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Details</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- STYLES -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style {csp-style-nonce}>
      body{
        background-color: black;
      }
   
    </style>
</head>
<body>


<section class="mt-5 mb-5 w-100">

    <div class="container h-50">
        <div class="d-flex flex-row align-items-center justify-content-center mx-auto gap-1" id="movies-container">
          

           <div class="flex-grow-1">
         <img src="/getimg/<?= $movieDetails['img'] ?>" class="flex-grow-1" style="width:90%;height:700px"></img>
           </div>
           
           <div class="flex-grow-1">
           <h1 class="text-white" style="font-size: 60px;"><?php echo $movieDetails['moviename'] ?></h1>
                <h5 class="text-white" style="font-size: 30px;">Movie Story:<?php echo $movieDetails['genre'] ?></h5>

                <h4 class="text-success fw-bold">Genre:<?php echo $movieDetails['genre'] ?></h4>
                <p class="text-secondary">Duration:<?php echo $movieDetails['duration'] ?> Hours</p>
                <p class="text-secondary">Release Date:<?php echo $movieDetails['release_date'] ?></p>
                <p class="text-secondary">Language:<?php echo $movieDetails['language'] ?></p>
                <p class="text-secondary">Director:<?php echo $movieDetails['quality'] ?></p>

                <p class="text-secondary">Cast:<?php echo $movieDetails['price'] ?></p>
              

                <p><i class="fa-solid fa-star" style="color:gold;"></i></p>
                <button type="button" class="btn btn-primary">Book Show Now</button>
           </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script {csp-script-nonce}>
   $(document).ready(function(){

   });

</script>

<!-- -->

</body>
</html>
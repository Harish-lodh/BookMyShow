<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMovies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <div class="d-flex">
    <h2>Booked Movies</h2>
    <button class="btn btn-secondary mb-2" id="backbtn" style="margin-left:900px">back</button></div>
    <?php if (!empty($bookmovies)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Seatnumber</th>
                    <th>Movie</th>
                    <th>Price</th>
                    <th>user_email</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookmovies as $movie): ?>
                    <tr>
                        <td><?= $movie['seat_number'] ?></td>
                        <td><?= $movie['movie'] ?></td>
                        <td><?= $movie['price'] ?></td>
                        <td><?= $movie['user_email']?><a href="/gen_ticket/<?= $movie['movie']?>?seat_number=<?= urlencode($movie['seat_number'])?>&price=<?=urlencode($movie['price'])?> "> Generate ticket</a></td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No movies booked by the current user.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
</script>
<script>
 const back=document.getElementById('backbtn');
    back.addEventListener('click',()=>{
        window.location.href='/home';
    });</script>
</body>

</html>

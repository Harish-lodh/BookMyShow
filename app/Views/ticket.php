<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/ticket_style.css" />
    <title>Movie Ticket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            margin: 0;
        }

        .back-container {
            width: 28%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .ticket {
            border: 2px dashed #333;
            padding: 20px;
            width: 400px;
            margin: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px dashed #333;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .ticket-header img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }

        .ticket-details {
            margin-top: 10px;
        }

        .ticket-details h2 {
            margin: 10px 0;
            font-size: 1.5rem;
            color: #333;
        }

        .ticket-details p {
            margin: 5px 0;
            color: #555;
        }

        .ticket-details p strong {
            color: #000;
        }

        #arrowbtn {
            cursor: pointer;
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <div class="back-container"> <i id="arrowbtn" class="fa-solid fa-arrow-left"></i> <button type="button" id="downloadBtn" class="btn btn-success">Download</button> </div>
    <div class="ticket">
        <div class="ticket-header">
            <div>
                <h2 style="color:red"><?php echo htmlspecialchars($movie['moviename']); ?></h2>
                <p style="color:green"><?php echo htmlspecialchars($movie['genre']); ?></p>
            </div><img src="<?= base_url('/getimg/' . htmlspecialchars($movie['img'])); ?>" alt="<?= htmlspecialchars($movie['moviename']); ?>">
        </div>
        <div class="ticket-details">
            <p><strong>Tickets:</strong> <?php echo htmlspecialchars($_GET['seat_number']); ?></p>
            <p><strong>Language:</strong> <?php echo htmlspecialchars($movie['language']); ?></p>
            <p><strong>Release Date:</strong> <?php echo htmlspecialchars($movie['release_date']); ?></p>
            <p><strong>Duration:</strong> <?php echo htmlspecialchars($movie['duration']); ?></p>
            <p><strong>Quality:</strong> <?php echo htmlspecialchars($movie['quality']); ?></p>
            <p><strong>Price:</strong> RS. <?php echo htmlspecialchars($_GET['price']); ?></p>
        </div>
    </div>
    <script>
        // JavaScript to handle back navigation 
        const backArrow = document.getElementById('arrowbtn');
        backArrow.addEventListener('click', () => {
            window.location.href = '/home';
        });
        const downloadBtn = document.getElementById('downloadBtn');
        downloadBtn.addEventListener('click', () => {
            const movieName = "<?php echo htmlspecialchars($movie['moviename']); ?>";
            const seatNumber = "<?php echo htmlspecialchars($_GET['seat_number']); ?>";
            const price = "<?php echo htmlspecialchars($_GET['price']); ?>";
            window.location.href = `/download_csv/${encodeURIComponent(movieName)}?seat_number=${encodeURIComponent(seatNumber)}?&price=${encodeURIComponent(price)}`;
        });
    </script>
</body>

</html>
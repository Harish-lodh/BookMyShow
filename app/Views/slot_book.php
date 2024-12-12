<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assests/Book_style.css" />
    <title>Movie Seat Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="movie-container">
    <i id="arrowbtn" class="fa-solid fa-arrow-left" style="cursor: pointer;margin-right:15px;" ></i>
        <label> movie:</label>
        <select id="movie">
            <option value="<?php echo $data['price']; ?>"><?php echo htmlspecialchars($data['moviename']); ?></option>
        </select>
    </div>

    <ul class="showcase">
        <li>
            <div class="seat"></div>
            <small>Available</small>
        </li>
        <li>
            <div class="seat selected"></div>
            <small>Selected</small>
        </li>
        <li>
            <div class="seat sold"></div>
            <small>Sold</small>
        </li>
    </ul>



    </div>
    <div class="container">
      
        <div class="screen"></div>
        <?php foreach (range('A', 'F') as $row): ?>
            <div class="row"> <?php foreach (range(1, 8) as $seatNumber): ?>
                    <?php $seatId = $row . $seatNumber; ?>
                  
                    <div class="seat <?php echo in_array($seatId, $seat_numbers) ? 'sold' : ''; ?>" data-seat="<?php echo $seatId; ?>"></div>
       
                     <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- <div class="container">
        <div class="screen"></div>

        <div class="row">
            <div class="seat" data-seat="A1"></div>
            <div class="seat" data-seat="A2"></div>
            <div class="seat" data-seat="A3"></div>
            <div class="seat" data-seat="A4"></div>
            <div class="seat" data-seat="A5"></div>
            <div class="seat" data-seat="A6"></div>
            <div class="seat" data-seat="A7"></div>
            <div class="seat" data-seat="A8"></div>
        </div>
        

        <div class="row">
            <div class="seat" data-seat="B1"></div>
            <div class="seat" data-seat="B2"></div>
            <div class="seat" data-seat="B3"></div>
            <div class="seat" data-seat="B4"></div>
            <div class="seat" data-seat="B5"></div>
            <div class="seat" data-seat="B6"></div>
            <div class="seat" data-seat="B7"></div>
            <div class="seat" data-seat="B8"></div>
        </div>
        
        <div class="row">
            <div class="seat" data-seat="C1"></div>
            <div class="seat" data-seat="C2"></div>
            <div class="seat" data-seat="C3"></div>
            <div class="seat" data-seat="C4"></div>
            <div class="seat" data-seat="C5"></div>
            <div class="seat" data-seat="C6"></div>
            <div class="seat" data-seat="C7"></div>
            <div class="seat" data-seat="C8"></div>
        </div>
        
        <div class="row">
            <div class="seat" data-seat="D1"></div>
            <div class="seat" data-seat="D2"></div>
            <div class="seat" data-seat="D3"></div>
            <div class="seat" data-seat="D4"></div>
            <div class="seat" data-seat="D5"></div>
            <div class="seat" data-seat="D6"></div>
            <div class="seat" data-seat="D7"></div>
            <div class="seat" data-seat="D8"></div>
        </div>
        
        <div class="row">
            <div class="seat" data-seat="E1"></div>
            <div class="seat" data-seat="E2"></div>
            <div class="seat" data-seat="E3"></div>
            <div class="seat" data-seat="E4"></div>
            <div class="seat" data-seat="E5"></div>
            <div class="seat" data-seat="E6"></div>
            <div class="seat" data-seat="E7"></div>
            <div class="seat" data-seat="E8"></div>
        </div>
        
        <div class="row">
            <div class="seat" data-seat="F1"></div>
            <div class="seat" data-seat="F2"></div>
            <div class="seat" data-seat="F3"></div>
            <div class="seat" data-seat="F4"></div>
            <div class="seat" data-seat="F5"></div>
            <div class="seat" data-seat="F6"></div>
            <div class="seat" data-seat="F7"></div>
            <div class="seat" data-seat="F8"></div>
        </div>
    </div> -->

    <p class="text">
        You have selected <span id="count">0</span> seat(s) for a price of RS.<span id="total">0</span>
    </p>
    <button id="bookButton" style="width: 100px; height: 30px; background-color: green;">Book</button>

    <script>
        const container = document.querySelector('.container');
        const seats = document.querySelectorAll('.row .seat:not(.sold)');
        const count = document.getElementById('count');
        const total = document.getElementById('total');
        const movieSelect = document.getElementById('movie');

        const bookButton = document.getElementById('bookButton');
        let ticketPrice = +movieSelect.value;
        // console.log(ticketPrice);
        const arrow=document.getElementById('arrowbtn');
        arrow.addEventListener('click',()=>{
            window.location.href='/home';
        });

        container.addEventListener('click', function(e) {
            if (e.target.classList.contains('seat') && !e.target.classList.contains('sold')) {
                e.target.classList.toggle('selected');
                updateSelectedCount();
            }
        });

        movieSelect.addEventListener('change', (e) => {
            ticketPrice = +e.target.value;
            updateSelectedCount();
        });

        bookButton.addEventListener('click', () => {
            const selectedSeats = document.querySelectorAll('.row .seat.selected');
            const seatsIndex = [...selectedSeats].map(seat => seat.dataset.seat);



            const selectedSeatsCount = selectedSeats.length;
            const selectedMovie = movieSelect.options[movieSelect.selectedIndex].text;
            const totalPrice = selectedSeatsCount * ticketPrice;

            fetch('<?= base_url("/bookSeat") ?>',{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    movie: selectedMovie,
                    selectedSeats: [...seatsIndex],
                    price: totalPrice
                })

            }).then(response => response.json()).then(data => {
                console.log('Response:', data);
                if (data.success) {
                   // alert(data.message);
                    selectedSeats.forEach(seat => {
                        seat.classList.remove('selected'); // Remove selected class
                        seat.classList.add('sold'); // Add sold class
                    });
               
                    window.location.href = `/gen_ticket/${selectedMovie}?seat_number=${seatsIndex}&price=${totalPrice}`;
                } else {
                    alert('Error: ' + data.message);
                }
            }).catch(error => {
                console.error('Error:', error);
            });

           
        });

        function updateSelectedCount() {
            const selectedSeats = document.querySelectorAll('.row .seat.selected');
            const selectedSeatsCount = selectedSeats.length;
            count.innerText = selectedSeatsCount;
            total.innerText = selectedSeatsCount * ticketPrice;
        }
    </script>
</body>

</html>
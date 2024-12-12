<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="#">BookMyShow</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Theaters</a>
                </li>
                
           
            </ul>
            <div class="d-flex gap-3">
                <?php if (session()->get('user_email')): ?>
                    <a href="/Booked" class="btn btn-success">See Booked Tickets</a>
                    <a href="/" class="btn btn-danger">Logout</a>
                    <span class="text-light fw-bold">Welcome <?= session()->get('user_email'); ?></span>

                <?php else: ?>
                    <span class="text-light">Guest</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

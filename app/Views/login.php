<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 25rem;
            margin: 1rem;
        }

        .nav-tabs {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>


    <div class="container w-50">
        
<?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show mt-3 " role="alert" style="margin-left:auto;width:300px;">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <?= implode('<br>', session()->getFlashdata('errors')) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <ul class="nav nav-tabs" id="authTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Register</button>
            </li>
        </ul>
        <div class="tab-content" id="authTabsContent">
            <!-- Login Forms -->
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                <ul class="nav nav-pills mb-3" id="loginFormTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="user-login-tab" data-bs-toggle="pill" data-bs-target="#user-login" type="button" role="tab" aria-controls="user-login" aria-selected="true">User Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="admin-login-tab" data-bs-toggle="pill" data-bs-target="#admin-login" type="button" role="tab" aria-controls="admin-login" aria-selected="false">Admin Login</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- User Login Form -->
                    <div class="tab-pane fade show active" id="user-login" role="tabpanel" aria-labelledby="user-login-tab">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">User Login</h5>
                                <form action="/login" method="post">
                                    <div class="mb-3">
                                        <label for="userLoginEmail" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="userLoginEmail" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userLoginPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="userLoginPassword" name="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Admin Login Form -->
                    <div class="tab-pane fade" id="admin-login" role="tabpanel" aria-labelledby="admin-login-tab">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Admin Login</h5>
                                <form action="/login" method="post">
                                    <div class="mb-3">
                                        <label for="adminLoginEmail" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="adminLoginEmail" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adminLoginPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="adminLoginPassword" name="password" required>
                                    </div>
                                    <button class="btn btn-danger w-100">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Registration Forms -->
            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                <ul class="nav nav-pills mb-3" id="registerFormTabs" role="tablist">
                </ul>
                <div class="tab-content">
                    <!-- User Registration Form -->
                    <div class="tab-pane fade show active" id="user-register" role="tabpanel" aria-labelledby="user-register-tab">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">User Register</h5>
                                <form action="/user/register" method="post">
                                    <div class="mb-3">
                                        <label for="userRegisterEmail" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="userRegisterEmail" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userRegisterPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="userRegisterPassword" name="password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userRegisterConfirmPassword" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="userRegisterConfirmPassword" name="confirm_password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
               
                   
                </div>
            </div>
        </div>
    </div>
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="../library/jquery.js"></script>
    <script src="../library/validate.js"></script>

    <style>
        body {
            height: 100vh;
        }
        .login-card {
            border-radius: 15px;
        }
    </style>
</head>
<body>


<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card login-card shadow-lg p-4" style="width: 400px;">
        
        <div class="text-center mb-4">
            <h3 class="fw-bold">Login</h3>
            <p class="text-muted">Sign in to your account</p>
        </div>

        <form method="post" novalidate>
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"  data-validation="required email">
                <span id="email_error" class="text-danger"></span>
                <!-- <div id="Email_Error" class="invalid-feedback d-block"></div>
                <div id="email_error" class="invalid-feedback"></div> -->

            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" data-validation="required strongPassword">
                <span id="password_error" class="text-danger"></span>
            </div>

            <!-- Remember Me + Forgot Password -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms" name="terms" data-validation="required"> 
                    <label class="form-check-label" for="terms">
                        Remember me
                    </label>
                    <span id="terms_error" class="text-danger d-none"></span>
                </div>
            </div>

            <!-- Login Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Login</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <p class="mb-0">Don't have an account? <a href="register.php" class="text-decoration-none">Register</a></p>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<!--form validation-->
</body>
</html>
<?php include 'footer.php'; ?>

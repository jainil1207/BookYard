<?php
session_start();

// Handle signup form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fullname']) && isset($_POST['email'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Simple validation
    if ($name && $email && $password) {
        // Set session for new user
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_phone'] = '+91 9876543210';
        $_SESSION['user_address'] = '123 Main St, City, State';
        $_SESSION['user_join_date'] = date('Y-m-d');
        $_SESSION['user_id'] = 'USR' . rand(1000, 9999);
        
        // Redirect to User Dashboard
        header("Location: ../User/dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - BookYard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000000;
            color: #ffffff;
            padding-top: 80px;
        }
        .signup-container {
            max-width: 450px;
            margin: 0 auto;
            background: #000000;
            border: 1px solid #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255,255,255,0.1);
            color: #ffffff;
        }
        @media (max-width: 576px) {
            .signup-container {
                margin: 0 15px;
                padding: 20px;
            }
            body {
                padding-top: 60px;
            }
        }
        .signup-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .signup-header h2 {
            color: #ffffff;
            font-weight: 600;
        }
        .btn-signup {
            background-color: #ffffff;
            border-color: #ffffff;
            color: #000000;
            width: auto;
            padding: 8px 20px;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
        .btn-signup:hover {
            background-color: #cccccc;
            border-color: #cccccc;
            color: #000000;
        }
        .btn-outline-secondary {
            margin-top: 10px;
            color: #ffffff;
            border-color: #ffffff;
        }
        .btn-outline-secondary:hover {
            background-color: #ffffff;
            color: #000000;
        }
    </style>
</head>
<body>
    <?php include '../Includes/navbar.php'; ?> 
     
    
    <div class="container">
        <div class="signup-container">
            <div class="signup-header">
                <h2>Create Account</h2>
                <p class="text-muted">Join BookYard today</p>
            </div>
            
            <form id="signupForm" method="POST" action="">
                <div class="form-group">
                    <label for="fullname" style="color: #ffffff;">Full Name</label>
                    <input type="text" class="form-control" id="fullname" placeholder="Enter your full name" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
                </div>
                
                <div class="form-group">
                    <label for="email" style="color: #ffffff;">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
                </div>
                
                <div class="form-group">
                    <label for="password" style="color: #ffffff;">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Create a password" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
                </div>
                
                <div class="form-group">
                    <label for="confirmPassword" style="color: #ffffff;">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
                </div>
                
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms" style="color: #ffffff;">
                        I agree to the <a href="#" class="text-primary">Terms and Conditions</a>
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary btn-signup">Sign Up</button>
                
                <div class="text-center mt-3">
                    <p class="text-muted">Already have an account? <a href="../Home.php" class="text-primary">Login</a></p>
                </div>
            </form>
            
            <hr class="my-4">
            
            <div class="text-center">
                <a href="../Home.php" class="btn btn-outline-secondary btn-block">Use without sign in</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    // Remove the JavaScript form submission handler to allow normal form submission
    // The PHP code at the top will handle the form processing and redirect
    </script>
</body>
</html>
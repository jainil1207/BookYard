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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="../js/validation.js"></script>
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
                <div class="form-group mb-3">
                    <label for="fullname" style="color: #ffffff;">Full Name</label>
                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter your full name"  style="background-color: #000000; color: #ffffff; border-color: #ffffff;" data-validate="required" data-min="2">
                    <span id="fullname_error"></span>
                </div>
                
                <div class="form-group">
                    <label for="email" style="color: #ffffff;">Email address</label>
                    <input type="text" name="txtEmail" class="form-control" id="email" placeholder="Enter your email" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;" data-validate="required" data-min="2">
                    <span id="email_error"></span>
                </div>
                
                <div class="form-group mb-3">
                    <label for="password" style="color: #ffffff;">Password</label>
                    <input type="text" name="txtPassword" class="form-control" id="password" placeholder="Create a password" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
                </div>
                
                <div class="form-group mb-3">
                    <label for="confirmPassword" style="color: #ffffff;">Confirm Password</label>
                    <input type="text" class="form-control" id="confirmPassword" placeholder="Confirm your password" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
                </div>
                
                <div class="form-group form-check mb-3">
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    $(document).ready(function() {
        $.validator.addMethod("pattern", function(value, element, param) {
            return this.optional(element) || param.test(value);
        }, "Invalid format.");

        $('#signupForm').validate({
            rules: {
                fullname: {
                    required: true,
                    minlength: 3,
                    maxlength: 50,
                    pattern: /^[a-zA-Z\s]+$/
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8,
                    pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/
                },
                confirmPassword: {
                    required: true,
                    equalTo: '#password'
                },
                terms: {
                    required: true
                }
            },
            messages: {
                fullname: {
                    required: 'Please enter your full name',
                    minlength: 'Name must be at least 3 characters long',
                    maxlength: 'Name cannot exceed 50 characters',
                    pattern: 'Name can only contain letters and spaces'
                },
                email: {
                    required: 'Please enter your email address',
                    email: 'Please enter a valid email address'
                },
                password: {
                    required: 'Please enter a password',
                    minlength: 'Password must be at least 8 characters long',
                    pattern: 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character'
                },
                confirmPassword: {
                    required: 'Please confirm your password',
                    equalTo: 'Passwords do not match'
                },
                terms: {
                    required: 'Please agree to the Terms and Conditions'
                }
            },
            errorElement: 'div',
            errorClass: 'text-danger small mt-1',
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
    </script>
</body>
</html>
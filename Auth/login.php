<?php
// Check if session is already started
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Demo user credentials (in real app, verify against database)
  if ($email === 'user@bookyard.com' && $password === 'user123') {
    $_SESSION['user_logged_in'] = true;
    $_SESSION['user_name'] = 'John Doe';
    $_SESSION['user_email'] = 'user@bookyard.com';
    $_SESSION['user_phone'] = '+91 9876543210';
    $_SESSION['user_address'] = '123 Main St, City, State';
    $_SESSION['user_join_date'] = '2024-01-01';
    $_SESSION['user_id'] = 'USR001';

    // Return success response
    echo json_encode(['success' => true, 'message' => 'Login successful!']);
    exit;
  }
  else {
    // Return error response
    echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
    exit;
  }
}

// Handle signup form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fullname']) && isset($_POST['signupEmail'])) {
  $name = $_POST['fullname'];
  $email = $_POST['signupEmail'];
  $password = $_POST['signupPassword'];

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

    // Return success response
    echo json_encode(['success' => true, 'message' => 'Account created successfully!']);
    exit;
  }
  else {
    // Return error response
    echo json_encode(['success' => false, 'message' => 'Please fill in all fields']);
    exit;
  }
}
?>


<?php
$is_standalone = basename($_SERVER['PHP_SELF']) === 'login.php';
?>

<?php if ($is_standalone): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BookYard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #000000;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1 class="mb-4">BookYard Authentication</h1>
        <button type="button" class="btn btn-light btn-lg me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
            Open Login Modal
        </button>
        <button type="button" class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#signupModal">
            Open Signup Modal
        </button>
    </div>
<?php
endif; ?>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #000000; border: 1px solid #ffffff;">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="loginModalLabel" style="color: #ffffff;">Welcome Back</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-muted text-center mb-4">Login to your BookYard account</p>
        
        <form id="loginForm">
          <div class="form-group mb-3">
            <label for="email" style="color: #ffffff;">Email address</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
            <div class="invalid-feedback"></div>
          </div>
          
          <div class="form-group mb-3">
            <label for="password" style="color: #ffffff;">Password</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Enter your password" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
            <div class="invalid-feedback"></div>
          </div>
          
          <div class="form-group form-check mb-3">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember" style="color: #ffffff;">Remember me</label>
            <div class="invalid-feedback"></div>
          </div>
          
          <button type="submit" class="btn btn-primary w-100" style="background-color: #ffffff; border-color: #ffffff; color: #000000;">Login</button>
          
          <div class="text-center mt-3">
            <a href="#" class="text-muted">Forgot password?</a>
          </div>
          
          <div class="text-center mt-4">
            <p class="text-muted">Don't have an account? <a href="#" onclick="showSignupModal()" class="text-primary">Sign Up</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #000000; border: 1px solid #ffffff;">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="signupModalLabel" style="color: #ffffff;">Create Account</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-muted text-center mb-4">Create your BookYard account</p>
        
        <form id="signupForm" novalidate>
          <div class="form-group mb-3">
            <label for="fullname" style="color: #ffffff;">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
            <div class="invalid-feedback"></div>
          </div>
          
          <div class="form-group mb-3">
            <label for="signupEmail" style="color: #ffffff;">Email address</label>
            <input type="text" class="form-control" id="signupEmail" name="signupEmail" placeholder="Enter your email" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
            <div class="invalid-feedback"></div>
          </div>
          
          <div class="form-group mb-3">
            <label for="signupPassword" style="color: #ffffff;">Password</label>
            <input type="text" class="form-control" id="signupPassword" name="signupPassword" placeholder="Create a password" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
            <div class="invalid-feedback"></div>
          </div>
          
          <div class="form-group mb-3">
            <label for="confirmPassword" style="color: #ffffff;">Confirm Password</label>
            <input type="text" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
            <div class="invalid-feedback"></div>
          </div>
          
          <div class="form-group form-check mb-3">
            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
            <label class="form-check-label" for="terms" style="color: #ffffff;">
              I agree to the <a href="#" class="text-primary">Terms and Conditions</a>
            </label>
            <div class="invalid-feedback"></div>
          </div>
          
          <button type="submit" class="btn btn-primary w-100" style="background-color: #ffffff; border-color: #ffffff; color: #000000;">Sign Up</button>
          
          <div class="text-center mt-3">
            <p class="text-muted">Already have an account? <a href="#" onclick="showLoginModal()" class="text-primary">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
.form-control {
  background-color: #000000 !important;
  color: #ffffff !important;
  border-color: #ffffff !important;
}
.form-control:focus {
  background-color: #000000 !important;
  color: #ffffff !important;
  border-color: #ffffff !important;
  box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.25) !important;
}
.form-control::placeholder {
  color: #cccccc !important;
}
.modal-content {
  background-color: #000000 !important;
  border: 1px solid #ffffff !important;
}
.modal-header {
  border-bottom: 1px solid #ffffff !important;
}
</style>

<?php if ($is_standalone): ?>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- jQuery Validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php
endif; ?>


<script>
$(document).ready(function() {
    // Determine the fetch URL based on context
    // If standalone, post to same file. If included (e.g. from index.php), post to Auth/login.php
    /*
    const isStandalone = <?php echo $is_standalone ? 'true' : 'false'; ?>;
    const actionUrl = isStandalone ? 'login.php' : 'Auth/login.php';
    */
    // Correction: In most cases, relative path 'Auth/login.php' works from root (index.php).
    // If we are in 'Auth/login.php', then 'Auth/login.php' relative path is wrong, it should be just 'login.php' or empty.
    // Ideally we want to post to 'Auth/login.php' from root, or 'login.php' from Auth dir.
    // Let's use a simpler approach: detecting current path in JS or PHP.
    
    // PHP Context is reliable:
    const actionUrl = "<?php echo $is_standalone ? '' : 'Auth/login.php'; ?>"; 

    // Login form validation
    $('#loginForm').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            email: {
                required: 'Please enter your email address',
                email: 'Please enter a valid email address'
            },
            password: {
                required: 'Please enter your password',
                minlength: 'Password must be at least 6 characters long'
            }
        },
        errorElement: 'div',
        errorClass: 'invalid-feedback',
        highlight: function(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid').addClass('is-valid');
        },
        submitHandler: function(form) {
            // Create form data
            const formData = new FormData(form);
            
            // Send AJAX request
            fetch(actionUrl, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    alert(data.message);
                    
                    // Close the modal
                    $('#loginModal').modal('hide');
                    
                    // Redirect to user dashboard
                    setTimeout(() => {
                        window.location.href = '<?php echo $is_standalone ? '../User/dashboard.php' : 'User/dashboard.php'; ?>';
                    }, 500);
                } else {
                    alert(data.message + ' Hint: try user@bookyard.com / user123');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        }
    });

    // Signup form validation
    $('#signupForm').validate({
        rules: {
            fullname: {
                required: true,
                minlength: 3,
                maxlength: 50,
                pattern: /^[a-zA-Z\s]+$/
            },
            signupEmail: {
                required: true,
                email: true
            },
            signupPassword: {
                required: true,
                minlength: 8,
                pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/
            },
            confirmPassword: {
                required: true,
                equalTo: '#signupPassword'
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
            signupEmail: {
                required: 'Please enter your email address',
                email: 'Please enter a valid email address'
            },
            signupPassword: {
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
        errorClass: 'invalid-feedback',
        highlight: function(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid').addClass('is-valid');
        },
        submitHandler: function(form) {
            // Create form data
            const formData = new FormData(form);
            formData.append('fullname', $('#fullname').val());
            formData.append('signupEmail', $('#signupEmail').val());
            formData.append('signupPassword', $('#signupPassword').val());
            
            // Send AJAX request
            fetch(actionUrl, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    alert(data.message);
                    
                    // Close the signup modal
                    $('#signupModal').modal('hide');
                    
                    // Redirect to user dashboard
                    setTimeout(() => {
                        window.location.href = '<?php echo $is_standalone ? '../User/dashboard.php' : 'User/dashboard.php'; ?>';
                    }, 500);
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        }
    });
});

function showSignupModal() {
    $('#loginModal').modal('hide');
    setTimeout(() => {
        $('#signupModal').modal('show');
    }, 300);
}

function showLoginModal() {
    $('#signupModal').modal('hide');
    setTimeout(() => {
        $('#loginModal').modal('show');
    }, 300);
}
</script>

<?php if ($is_standalone): ?>
</body>
</html>
<?php
endif; ?>
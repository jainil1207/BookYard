<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - BookYard</title>
     <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php
        session_start();

        // Check if user is already logged in
        if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
            header('Location: dashboard.php');
            exit;
        }

        // Handle login
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
        
         // Simple authentication (in production, use proper password hashing and database)
    if ($username === 'admin' && $password === 'admin123') {
             $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
             header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
?>
    <style>
        :root {
            --primary-color: #000000;
            --secondary-color: #333333;
            --accent-color: #ffffff;
            --text-light: #ffffff;
            --bg-light: #000000;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-light);
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .background-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.1) 35px, rgba(255,255,255,.1) 70px);
            animation: slide 20s linear infinite;
        }

        @keyframes slide {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            min-height: 500px;
            display: flex;
            position: relative;
            z-index: 10;
        }

        .login-left {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--text-light);
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex: 1;
        }

        .login-right {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex: 1.2;
        }

        .logo {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--text-light);
        }

        .login-left h2 {
            font-size: 2rem;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .login-left p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .features {
            text-align: left;
            width: 100%;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            opacity: 0.9;
        }

        .feature-item i {
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .login-right h3 {
            color: var(--primary-color);
            margin-bottom: 30px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
            background-color: white;
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .input-group i:hover {
            color: var(--accent-color);
        }

        .password-toggle {
            background: none;
            border: none;
            cursor: pointer;
            color: #6c757d;
            padding: 5px;
        }

        .password-toggle:hover {
            color: var(--accent-color);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .form-check {
            display: flex;
            align-items: center;
        }

        .form-check-input {
            margin-right: 8px;
        }

        .forgot-link {
            color: var(--accent-color);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #2980b9;
            text-decoration: underline;
        }

        .btn-login {
            background: #000000;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-bottom: 20px;
        }

        .btn-login:hover {
            background: #333333;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e9ecef;
        }

        .divider span {
            background: white;
            padding: 0 15px;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .social-login {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .social-btn {
            flex: 1;
            padding: 10px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .social-btn:hover {
            border-color: var(--accent-color);
            transform: translateY(-2px);
        }

        .signup-link {
            text-align: center;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .signup-link a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 500;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 10px;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: none;
            display: none;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 400px;
                margin: 20px;
            }

            .login-left {
                padding: 30px;
                min-height: auto;
            }

            .login-right {
                padding: 30px;
            }

            .logo {
                font-size: 2.5rem;
            }

            .login-left h2 {
                font-size: 1.5rem;
            }

            .social-login {
                flex-direction: column;
            }
        }

        .loading {
            display: none;
            text-align: center;
            margin-top: 10px;
        }

        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--accent-color);
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
            display: inline-block;
            margin-right: 10px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="background-pattern"></div>
    
    <div class="login-container">
        <div class="login-left">
            <div class="logo">
                <i class="fas fa-book"></i>
            </div>
            <h2>BookYard</h2>
            <p>Admin Panel Login</p>
            
            <div class="features">
                <div class="feature-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Secure Authentication</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Advanced Dashboard</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-users"></i>
                    <span>User Management</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-chart-bar"></i>
                    <span>Analytics & Reports</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-cog"></i>
                    <span>System Configuration</span>
                </div>
            </div>
        </div>
        
        <div class="login-right">
            <h3>Admin Login</h3>
            
            <div class="alert alert-danger" id="errorAlert" style="<?php echo !empty($error) ? 'display: block;' : 'display: none;'; ?>">
                <i class="fas fa-exclamation-triangle"></i> <span id="errorMessage"><?php echo $error ?? ''; ?></span>
            </div>
            
            <div class="alert alert-success" id="successAlert" style="<?php echo isset($_GET['logout']) && $_GET['logout'] === 'success' ? 'display: block;' : 'display: none;'; ?>">
                <i class="fas fa-check-circle"></i> <span id="successMessage"><?php echo isset($_GET['logout']) && $_GET['logout'] === 'success' ? 'You have been successfully logged out.' : ''; ?></span>
            </div>
            
            <form id="loginForm" method="POST" action="">
                <div class="form-group">
                    <label for="username" class="form-label">Username or Email</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="username" name="username" required>
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye" id="passwordToggle"></i>
                        </button>
                    </div>
                </div>
                
                <div class="remember-forgot">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <a href="#" class="forgot-link" onclick="showForgotPassword(); return false;">Forgot password?</a>
                </div>
                
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>
                
                <div class="loading" id="loadingIndicator">
                    <div class="spinner"></div>
                    Signing in...
                </div>
            </form>
            
            <div class="divider">
                <span>OR</span>
            </div>
            
            <div class="social-login">
                <button class="social-btn" onclick="socialLogin('google')">
                    <i class="fab fa-google"></i>
                    Google
                </button>
                <button class="social-btn" onclick="socialLogin('microsoft')">
                    <i class="fab fa-microsoft"></i>
                    Microsoft
                </button>
            </div>
            
            <div class="signup-link">
                Don't have an admin account? <a href="#">Contact System Administrator</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize jQuery Validation
            $('#loginForm').validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,
                        // Allow alphanumeric characters, email, or underscore
                        pattern: /^[a-zA-Z0-9_@.-]+$/
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 100
                    }
                },
                messages: {
                    username: {
                        required: 'Please enter your username or email',
                        minlength: 'Username must be at least 3 characters long',
                        maxlength: 'Username cannot exceed 50 characters',
                        pattern: 'Username can only contain letters, numbers, and basic symbols'
                    },
                    password: {
                        required: 'Please enter your password',
                        minlength: 'Password must be at least 6 characters long',
                        maxlength: 'Password cannot exceed 100 characters'
                    }
                },
                errorElement: 'div',
                errorClass: 'invalid-feedback',
                errorPlacement: function(error, element) {
                    // Insert error after the input-group
                    error.insertAfter(element.closest('.input-group'));
                    // Add error styling
                    error.css({
                        'color': '#dc3545',
                        'font-size': '0.875rem',
                        'margin-top': '5px'
                    });
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid').removeClass('is-valid');
                    $(element).css('border-color', '#dc3545');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                    $(element).css('border-color', '#28a745');
                },
                submitHandler: function(form) {
                    // Show loading state
                    const loadingIndicator = $('#loadingIndicator');
                    const loginBtn = $('.btn-login');
                    
                    loadingIndicator.show();
                    loginBtn.prop('disabled', true);
                    loginBtn.html('<i class="fas fa-spinner fa-spin"></i> Signing in...');
                    
                    // Get form data
                    const formData = new FormData(form);
                    
                    // Submit form via AJAX
                    $.ajax({
                        url: 'Admin-login.php',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                showAlert('success', 'Login successful! Redirecting to dashboard...');
                                
                                // Handle remember me
                                const remember = $('#remember').is(':checked');
                                const username = $('#username').val();
                                
                                if (remember) {
                                    localStorage.setItem('rememberUser', username);
                                } else {
                                    sessionStorage.setItem('currentUser', username);
                                }
                                
                                // Redirect to dashboard
                                setTimeout(() => {
                                    window.location.href = 'dashboard.php';
                                }, 1500);
                            } else {
                                showAlert('error', response.message || 'Invalid username or password');
                                resetFormState();
                            }
                        },
                        error: function() {
                            // Fallback to client-side validation for demo
                            const username = $('#username').val();
                            const password = $('#password').val();
                            
                            if (username === 'admin' && password === 'admin123') {
                                showAlert('success', 'Login successful! Redirecting to dashboard...');
                                
                                // Handle remember me
                                const remember = $('#remember').is(':checked');
                                
                                if (remember) {
                                    localStorage.setItem('rememberUser', username);
                                } else {
                                    sessionStorage.setItem('currentUser', username);
                                }
                                
                                // Redirect to dashboard
                                setTimeout(() => {
                                    window.location.href = 'dashboard.php';
                                }, 1500);
                            } else {
                                showAlert('error', 'Invalid username or password. Hint: try admin/admin123');
                                resetFormState();
                            }
                        }
                    });
                }
            });
            
            // Function to reset form state
            function resetFormState() {
                const loadingIndicator = $('#loadingIndicator');
                const loginBtn = $('.btn-login');
                
                loadingIndicator.hide();
                loginBtn.prop('disabled', false);
                loginBtn.html('<i class="fas fa-sign-in-alt"></i> Sign In');
                
                // Clear password field
                $('#password').val('');
            }
            
            // Make resetFormState global
            window.resetFormState = resetFormState;
        });

        function togglePassword() {
            const passwordField = document.getElementById('password');
            const passwordToggle = document.getElementById('passwordToggle');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordToggle.classList.remove('fa-eye');
                passwordToggle.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                passwordToggle.classList.remove('fa-eye-slash');
                passwordToggle.classList.add('fa-eye');
            }
        }

        function showAlert(type, message) {
            const errorAlert = document.getElementById('errorAlert');
            const successAlert = document.getElementById('successAlert');
            const errorMessage = document.getElementById('errorMessage');
            const successMessage = document.getElementById('successMessage');
            
            // Hide all alerts first
            errorAlert.style.display = 'none';
            successAlert.style.display = 'none';
            
            if (type === 'error') {
                errorMessage.textContent = message;
                errorAlert.style.display = 'block';
            } else if (type === 'success') {
                successMessage.textContent = message;
                successAlert.style.display = 'block';
            }
            
            // Auto hide after 5 seconds
            setTimeout(() => {
                errorAlert.style.display = 'none';
                successAlert.style.display = 'none';
            }, 5000);
        }

        function socialLogin(provider) {
            showAlert('success', `Redirecting to ${provider} login...`);
            
            // In a real application, this would redirect to OAuth provider
            setTimeout(() => {
                window.location.href = `https://accounts.${provider}.com/oauth/authorize`;
            }, 1500);
        }

        function showForgotPassword() {
            const username = document.getElementById('username').value;
            
            if (!username) {
                showAlert('error', 'Please enter your username or email first');
                return;
            }
            
            showAlert('success', 'Password reset link has been sent to your email');
            
            // In a real application, this would send an email
            console.log('Password reset requested for:', username);
        }

        // Check for remembered user on page load
        window.onload = function() {
            const rememberedUser = localStorage.getItem('rememberUser');
            if (rememberedUser) {
                document.getElementById('username').value = rememberedUser;
                document.getElementById('remember').checked = true;
            }
            
            // Add input animations
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });
        };

        // Add keyboard shortcuts
        document.addEventListener('keydown', function(event) {
            // Ctrl/Cmd + Enter to submit form
            if ((event.ctrlKey || event.metaKey) && event.key === 'Enter') {
                document.getElementById('loginForm').dispatchEvent(new Event('submit'));
            }
            
            // Escape to clear alerts
            if (event.key === 'Escape') {
                document.getElementById('errorAlert').style.display = 'none';
                document.getElementById('successAlert').style.display = 'none';
            }
        });
    </script>
</body>
</html>
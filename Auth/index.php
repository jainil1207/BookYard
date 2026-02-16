<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BookYard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #000000;
            --secondary-color: #333333;
            --accent-color: #ffffff;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
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
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            color: #ffffff;
        }

        .background-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.2) 35px, rgba(255,255,255,.2) 70px);
            animation: slide 20s linear infinite;
        }

        @keyframes slide {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        .login-container {
            background: #000000;
            border: 1px solid #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(255, 255, 255, 0.1);
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
            border-right: 1px solid rgba(255, 255, 255, 0.2);
        }

        .login-right {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex: 1.2;
            background-color: #000000;
            color: #ffffff;
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
            color: #ffffff;
        }

        .login-left p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 30px;
            color: #ffffff;
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
            color: #ffffff;
        }

        .feature-item i {
            margin-right: 15px;
            font-size: 1.2rem;
            color: #ffffff;
        }

        .login-right h3 {
            color: var(--accent-color);
            margin-bottom: 30px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 500;
            color: var(--accent-color);
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border: 2px solid #ffffff;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #000000;
            color: #ffffff;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
            background-color: #000000;
            color: #ffffff;
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #ffffff;
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
            color: #ffffff;
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
            color: #cccccc;
            text-decoration: underline;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--accent-color), #cccccc);
            color: #000000;
            border: 1px solid #ffffff;
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
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.3);
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
            background: #ffffff;
        }

        .divider span {
            background: #000000;
            padding: 0 15px;
            color: #ffffff;
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
            border: 2px solid #ffffff;
            border-radius: 10px;
            background: #000000;
            color: #ffffff;
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
            background-color: #ffffff;
            color: #000000;
        }

        .signup-link {
            text-align: center;
            color: #ffffff;
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
            border: 3px solid #ffffff;
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
            <p>Your Digital Library for Engineering Excellence</p>
            
            <div class="features">
                <div class="feature-item">
                    <i class="fas fa-book-reader"></i>
                    <span>Access thousands of books</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-download"></i>
                    <span>Download & read offline</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-mobile-alt"></i>
                    <span>Read on any device</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-infinity"></i>
                    <span>Unlimited reading</span>
                </div>
            </div>
        </div>
        
        <div class="login-right">
            <h3>Welcome Back</h3>
            
            <div class="alert alert-danger" id="errorAlert">
                <i class="fas fa-exclamation-triangle"></i> <span id="errorMessage"></span>
            </div>
            
            <div class="alert alert-success" id="successAlert">
                <i class="fas fa-check-circle"></i> <span id="successMessage"></span>
            </div>
            
            <form id="loginForm">
                <div class="form-group">
                    <label for="email" class="form-label">Email address</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye" id="passwordToggle"></i>
                        </button>
                    </div>
                </div>
                
                <div class="remember-forgot">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
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
                Don't have an account? <a href="Signup.php">Sign up</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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

        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const remember = document.getElementById('remember').checked;
            const loadingIndicator = document.getElementById('loadingIndicator');
            const loginBtn = document.querySelector('.btn-login');
            
            // Basic validation
            if (!email || !password) {
                showAlert('error', 'Please enter both email and password');
                return false;
            }
            
            // Show loading state
            loadingIndicator.style.display = 'block';
            loginBtn.disabled = true;
            loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Signing in...';
            
            // Simulate API call (replace with actual authentication)
            setTimeout(() => {
                // Demo credentials - replace with actual authentication
                if (email === 'user@bookyard.com' && password === 'user123') {
                    showAlert('success', 'Login successful! Redirecting to dashboard...');
                    
                    // Store session (in real app, this would be server-side)
                    if (remember) {
                        localStorage.setItem('rememberUser', email);
                    } else {
                        sessionStorage.setItem('currentUser', email);
                    }
                    
                    // Redirect to dashboard
                    setTimeout(() => {
                        window.location.href = '../User/dashboard.php';
                    }, 1500);
                } else {
                    showAlert('error', 'Invalid email or password');
                    
                    // Reset form state
                    loadingIndicator.style.display = 'none';
                    loginBtn.disabled = false;
                    loginBtn.innerHTML = '<i class="fas fa-sign-in-alt"></i> Sign In';
                    
                    // Clear password field
                    document.getElementById('password').value = '';
                }
            }, 2000);
            
            return false;
        });

        function socialLogin(provider) {
            showAlert('success', `Redirecting to ${provider} login...`);
            
            // In a real application, this would redirect to OAuth provider
            setTimeout(() => {
                window.location.href = `https://accounts.${provider}.com/oauth/authorize`;
            }, 1500);
        }

        function showForgotPassword() {
            const email = document.getElementById('email').value;
            
            if (!email) {
                showAlert('error', 'Please enter your email address first');
                return;
            }
            
            showAlert('success', 'Password reset link has been sent to your email');
            
            // In a real application, this would send an email
            console.log('Password reset requested for:', email);
        }

        // Check for remembered user on page load
        window.onload = function() {
            const rememberedUser = localStorage.getItem('rememberUser');
            if (rememberedUser) {
                document.getElementById('email').value = rememberedUser;
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

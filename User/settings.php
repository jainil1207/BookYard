<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: ../Auth/login.php');
    exit;
}

// Get user information
$user_name = $_SESSION['user_name'] ?? 'User';
$user_email = $_SESSION['user_email'] ?? 'user@example.com';

// Handle settings update
$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // In a real application, this would update the database
    $email_notifications = isset($_POST['email_notifications']) ? 1 : 0;
    $sms_notifications = isset($_POST['sms_notifications']) ? 1 : 0;
    $due_date_reminders = isset($_POST['due_date_reminders']) ? 1 : 0;
    $new_arrivals = isset($_POST['new_arrivals']) ? 1 : 0;
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    $language = $_POST['language'] ?? 'english';
    $timezone = $_POST['timezone'] ?? 'UTC';
    $theme = $_POST['theme'] ?? 'light';
    
    // Update session variables (in real app, update database)
    $_SESSION['user_settings'] = [
        'email_notifications' => $email_notifications,
        'sms_notifications' => $sms_notifications,
        'due_date_reminders' => $due_date_reminders,
        'new_arrivals' => $new_arrivals,
        'newsletter' => $newsletter,
        'language' => $language,
        'timezone' => $timezone,
        'theme' => $theme
    ];
    
    $success_message = 'Settings updated successfully!';
}

// Get current settings (default values if not set)
$settings = $_SESSION['user_settings'] ?? [
    'email_notifications' => 1,
    'sms_notifications' => 0,
    'due_date_reminders' => 1,
    'new_arrivals' => 1,
    'newsletter' => 0,
    'language' => 'english',
    'timezone' => 'Asia/Kolkata',
    'theme' => 'light'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - BookYard User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 250px;
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
            background-color: #000000;
            color: #ffffff;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--text-light);
            z-index: 1000;
            transition: transform 0.3s ease;
            border-right: 1px solid #333333;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h3 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .sidebar-header p {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .user-info {
            padding: 15px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .user-avatar {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            display: block;
            padding: 12px 20px;
            color: var(--text-light);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: var(--accent-color);
            padding-left: 25px;
        }

        .menu-item.active {
            background-color: rgba(255, 255, 255, 0.15);
            border-left-color: var(--accent-color);
        }

        .menu-item i {
            width: 20px;
            margin-right: 10px;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: 100vh;
        }

        .top-bar {
            background: #1a1a1a;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #ffffff;
        }

        .settings-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .settings-card {
            background: #1a1a1a;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
            overflow: hidden;
            color: #ffffff;
        }

        .settings-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px;
        }

        .settings-header h5 {
            margin: 0;
            font-size: 1.2rem;
        }

        .settings-body {
            padding: 25px;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .form-section h6 {
            color: var(--accent-color);
            margin-bottom: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-check {
            margin-bottom: 15px;
        }

        .form-check-input:checked {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .form-select:focus,
        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 10px 30px;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 10px 30px;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .mobile-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .theme-preview {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .theme-option {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            border: 3px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .theme-option:hover {
            transform: scale(1.05);
        }

        .theme-option.selected {
            border-color: var(--accent-color);
        }

        .theme-option.selected::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .theme-light {
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
            border: 2px solid #dee2e6;
        }

        .theme-dark {
            background: linear-gradient(135deg, #000000, #333333);
        }

        .theme-blue {
            background: linear-gradient(135deg, #000000, #666666);
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-toggle {
                display: block;
            }
        }
    </style>
</head>
<body>
    <button class="mobile-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3><i class="fas fa-book"></i> BookYard</h3>
            <p>User Portal</p>
        </div>
        
        <div class="user-info">
            <div class="user-avatar">
                <?php echo strtoupper(substr($user_name, 0, 2)); ?>
            </div>
            <div class="user-name"><?php echo htmlspecialchars($user_name); ?></div>
            <div class="user-email" style="font-size: 0.8rem; opacity: 0.8;"><?php echo htmlspecialchars($user_email); ?></div>
        </div>
        
        <nav class="sidebar-menu">
            <a href="dashboard.php" class="menu-item">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="my-books.php" class="menu-item">
                <i class="fas fa-book"></i> My Books
            </a>
            <a href="browse-books.php" class="menu-item">
                <i class="fas fa-search"></i> Browse Books
            </a>
            <a href="book-history.php" class="menu-item">
                <i class="fas fa-history"></i> Book History
            </a>
            <a href="reserved-books.php" class="menu-item">
                <i class="fas fa-bookmark"></i> Reserved Books
            </a>
            <a href="profile.php" class="menu-item">
                <i class="fas fa-user"></i> Profile
            </a>
            <a href="settings.php" class="menu-item active">
                <i class="fas fa-cog"></i> Settings
            </a>
            <a href="change-password.php" class="menu-item">
                <i class="fas fa-key"></i> Change Password
            </a>
            <a href="../Home.php" class="menu-item">
                <i class="fas fa-home"></i> Back to Library
            </a>
            <a href="logout.php" class="menu-item">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <h1>Settings</h1>
            <div>
                <span>Welcome, <?php echo htmlspecialchars($user_name); ?>!</span>
                <i class="fas fa-user-circle ms-2" style="font-size: 1.5rem;"></i>
            </div>
        </div>

        <?php if ($success_message): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> <?php echo $success_message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($error_message): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle"></i> <?php echo $error_message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="settings-container">
                <!-- Notification Settings -->
                <div class="settings-card">
                    <div class="settings-header">
                        <h5><i class="fas fa-bell"></i> Notification Preferences</h5>
                    </div>
                    <div class="settings-body">
                        <div class="form-section">
                            <h6><i class="fas fa-envelope"></i> Email Notifications</h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="email_notifications" name="email_notifications" <?php echo $settings['email_notifications'] ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="email_notifications">
                                    Enable email notifications
                                </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="due_date_reminders" name="due_date_reminders" <?php echo $settings['due_date_reminders'] ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="due_date_reminders">
                                    Due date reminders (3 days before)
                                </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="new_arrivals" name="new_arrivals" <?php echo $settings['new_arrivals'] ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="new_arrivals">
                                    New book arrivals in favorite categories
                                </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter" <?php echo $settings['newsletter'] ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="newsletter">
                                    Monthly newsletter and recommendations
                                </label>
                            </div>
                        </div>

                        <div class="form-section">
                            <h6><i class="fas fa-sms"></i> SMS Notifications</h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="sms_notifications" name="sms_notifications" <?php echo $settings['sms_notifications'] ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="sms_notifications">
                                    Enable SMS notifications for urgent alerts
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Display Settings -->
                <div class="settings-card">
                    <div class="settings-header">
                        <h5><i class="fas fa-palette"></i> Display Preferences</h5>
                    </div>
                    <div class="settings-body">
                        <div class="form-section">
                            <h6><i class="fas fa-paint-brush"></i> Theme</h6>
                            <div class="theme-preview">
                                <div class="theme-option theme-light <?php echo $settings['theme'] === 'light' ? 'selected' : ''; ?>" onclick="selectTheme('light')"></div>
                                <div class="theme-option theme-dark <?php echo $settings['theme'] === 'dark' ? 'selected' : ''; ?>" onclick="selectTheme('dark')"></div>
                                <div class="theme-option theme-blue <?php echo $settings['theme'] === 'blue' ? 'selected' : ''; ?>" onclick="selectTheme('blue')"></div>
                            </div>
                            <input type="hidden" id="theme" name="theme" value="<?php echo $settings['theme']; ?>">
                        </div>

                        <div class="form-section">
                            <h6><i class="fas fa-language"></i> Language</h6>
                            <select class="form-select" id="language" name="language">
                                <option value="english" <?php echo $settings['language'] === 'english' ? 'selected' : ''; ?>>English</option>
                                <option value="hindi" <?php echo $settings['language'] === 'hindi' ? 'selected' : ''; ?>>हिंदी (Hindi)</option>
                                <option value="gujarati" <?php echo $settings['language'] === 'gujarati' ? 'selected' : ''; ?>>ગુજરાતી (Gujarati)</option>
                            </select>
                        </div>

                        <div class="form-section">
                            <h6><i class="fas fa-clock"></i> Timezone</h6>
                            <select class="form-select" id="timezone" name="timezone">
                                <option value="UTC" <?php echo $settings['timezone'] === 'UTC' ? 'selected' : ''; ?>>UTC</option>
                                <option value="Asia/Kolkata" <?php echo $settings['timezone'] === 'Asia/Kolkata' ? 'selected' : ''; ?>>India Standard Time (IST)</option>
                                <option value="America/New_York" <?php echo $settings['timezone'] === 'America/New_York' ? 'selected' : ''; ?>>Eastern Time (ET)</option>
                                <option value="Europe/London" <?php echo $settings['timezone'] === 'Europe/London' ? 'selected' : ''; ?>>Greenwich Mean Time (GMT)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Privacy Settings -->
                <div class="settings-card">
                    <div class="settings-header">
                        <h5><i class="fas fa-shield-alt"></i> Privacy & Security</h5>
                    </div>
                    <div class="settings-body">
                        <div class="form-section">
                            <h6><i class="fas fa-eye"></i> Privacy</h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="profile_visibility" checked>
                                <label class="form-check-label" for="profile_visibility">
                                    Make profile visible to other members
                                </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="reading_history" checked>
                                <label class="form-check-label" for="reading_history">
                                    Show reading history on profile
                                </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="recommendations" checked>
                                <label class="form-check-label" for="recommendations">
                                    Allow personalized recommendations
                                </label>
                            </div>
                        </div>

                        <div class="form-section">
                            <h6><i class="fas fa-lock"></i> Security</h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="two_factor" checked>
                                <label class="form-check-label" for="two_factor">
                                    Enable two-factor authentication
                                </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="login_alerts" checked>
                                <label class="form-check-label" for="login_alerts">
                                    Email alerts for new login attempts
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="settings-card">
                    <div class="settings-body text-center">
                        <button type="submit" class="btn btn-primary me-3">
                            <i class="fas fa-save"></i> Save Settings
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="resetSettings()">
                            <i class="fas fa-undo"></i> Reset to Default
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function selectTheme(theme) {
            // Remove selected class from all theme options
            document.querySelectorAll('.theme-option').forEach(option => {
                option.classList.remove('selected');
            });
            
            // Add selected class to clicked theme
            event.target.classList.add('selected');
            
            // Update hidden input
            document.getElementById('theme').value = theme;
        }

        function resetSettings() {
            if (confirm('Are you sure you want to reset all settings to default values?')) {
                // Reset form to default values
                document.getElementById('email_notifications').checked = true;
                document.getElementById('sms_notifications').checked = false;
                document.getElementById('due_date_reminders').checked = true;
                document.getElementById('new_arrivals').checked = true;
                document.getElementById('newsletter').checked = false;
                document.getElementById('language').value = 'english';
                document.getElementById('timezone').value = 'Asia/Kolkata';
                document.getElementById('theme').value = 'light';
                
                // Reset theme selection
                document.querySelectorAll('.theme-option').forEach(option => {
                    option.classList.remove('selected');
                });
                document.querySelector('.theme-light').classList.add('selected');
                
                alert('Settings have been reset to default values.');
            }
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.mobile-toggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !toggle.contains(event.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
    </script>
</body>
</html>

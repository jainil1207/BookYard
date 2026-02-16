<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - BookYard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <button class="mobile-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3><i class="fas fa-book"></i> BookYard</h3>
            <p>Admin Panel</p>
        </div>
        <nav class="sidebar-menu">
            <a href="dashboard.php" class="menu-item">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="manage-books.php" class="menu-item">
                <i class="fas fa-book"></i> Manage Books
            </a>
            <a href="add-book.php" class="menu-item">
                <i class="fas fa-plus-circle"></i> Add Book
            </a>
            <a href="manage-categories.php" class="menu-item">
                <i class="fas fa-tags"></i> Categories
            </a>
            <a href="manage-users.php" class="menu-item">
                <i class="fas fa-users"></i> Manage Users
            </a>
            <a href="add-user.php" class="menu-item">
                <i class="fas fa-user-plus"></i> Add User
            </a>
            <a href="issue-books.php" class="menu-item">
                <i class="fas fa-hand-holding"></i> Issue Books
            </a>
            <a href="return-books.php" class="menu-item">
                <i class="fas fa-undo"></i> Return Books
            </a>
            <a href="reports.php" class="menu-item">
                <i class="fas fa-chart-bar"></i> Reports
            </a>
            <a href="User/profile.php" class="menu-item active">
                <i class="fas fa-user"></i> Profile
            </a>
            <a href="change-password.php" class="menu-item">
                <i class="fas fa-key"></i> Change Password
            </a>
            <a href="logout.php" class="menu-item">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <h1>Profile</h1>
            <div>
                <a href="dashboard.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>

        <div class="content-card">
            <div class="profile-header">
                <img src="https://picsum.photos/seed/admin/120/120.jpg" alt="Profile" class="profile-avatar">
                <div class="profile-info">
                    <h3>John Doe</h3>
                    <p><i class="fas fa-envelope"></i> john.doe@bookyard.com</p>
                    <p><i class="fas fa-phone"></i> +1 234-567-8900</p>
                    <p><i class="fas fa-calendar"></i> Joined: January 10, 2024</p>
                    <p><i class="fas fa-shield-alt"></i> Admin</p>
                </div>
            </div>

            <div class="profile-stats">
                <div class="stat-item">
                    <div class="stat-value">156</div>
                    <div class="stat-label">Books Issued</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">23</div>
                    <div class="stat-label">Books Returned</div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="stat-value">89</div>
                    <div class="stat-label">Overdue Returns</div>
                </div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">4.8</</div>
                    <div class="stat-label">Avg. Days Late</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">$125</div>
                    <div class="stat-label">Total Fines</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-section">
                        <h5><i class="fas fa-user-edit"></i> Personal Information</h5>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" value="John">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" value="Doe">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" value="john.doe@bookyard.com">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" value="+1 234-567-8900">
                        </div>
                        <div class="mb-3">
                            <label for="dateOfBirth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dateOfBirth" value="1990-05-15">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-section">
                        <h5><i class="fas fa-lock"></i> Security Settings</h5>
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" value="********" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h5><i class="fas fa-bell"></i> Notification Preferences</h5>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" id="emailNotifications" checked>
                        <label class="form-check-label">Email Notifications</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" id="smsNotifications">
                        <label class="form-check-label">SMS Notifications</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" id="dueDateReminders" checked>
                        <label class="form-check-label">Due Date Reminders</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" id="newBookAlerts" checked>
                        <label class="form-check-label">New Book Alerts</label>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h5><i class="fas fa-cog"></i> Display Preferences</h5>
                <div class="mb-3">
                    <label for="theme" class="form-label">Theme</label>
                    <select class="form-select" id="theme">
                        <option value="light">Light</option>
                        <option value="dark">Dark</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="language" class="form-label">Language</label>
                    <select class="form-select" id="language">
                        <option value="english">English</option>
                        <option value="spanish">Spanish</option>
                        <option value="french">French</option>
                        <option value="german">German</option>
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <button type="button" class="btn btn-secondary" onclick="resetForm()">
                    <i class="fas fa-redo"></i> Reset
                </button>
                <button type="submit" class="btn btn-primary" onclick="saveProfile()">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>
        </div>

        <div class="form-section">
            <h5><i class="fas fa-history"></i> Recent Activity</h5>
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-details">
                            <div class="activity-title">Book Issued</div>
                            <div class="activity-description">The Great Gatsby issued to Jane Smith</div>
                            <div class="activity-time">2 hours ago</div>
                        </div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-undo"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-details">
                            <div class="activity-title">Book Returned</div>
                            <div class="activity-description">1984 returned by Robert Johnson</div>
                            <div class="activity-time">1 day ago</div>
                        </div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-details">
                            <div class="activity-title">New User Registration</div>
                            <div class="activity-description">Emily Davis joined the library</div>
                            <div class="activity-time">3 days ago</div>
                        </div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-details">
                            <div class="activity-title">Fine Payment</div>
                            <div class="activity-description">Michael Wilson paid late return fine</div>
                            <div class="activity-time">5 days ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function resetForm() {
            document.getElementById('firstName').value = 'John';
            document.getElementById('lastName').value = 'Doe';
            document.getElementById('email').value = 'john.doe@bookyard.com';
            document.getElementById('phone').value = '+1 234-567-8900';
            document.getElementById('dateOfBirth').value = '1990-05-15';
            document.getElementById('newPassword').value = '';
            document.getElementById('confirmPassword').value = '';
            document.getElementById('emailNotifications').checked = true;
            document.getElementById('smsNotifications').checked = false;
            document.getElementById('dueDateReminders').checked = true;
            document.getElementById('newBookAlerts').checked = true;
            document.getElementById('theme').value = 'light';
            document.getElementById('language').value = 'english';
        }

        function saveProfile() {
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const dateOfBirth = document.getElementById('dateOfBirth').value;
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const emailNotifications = document.getElementById('emailNotifications').checked;
            const smsNotifications = document.getElementById('smsNotifications').checked;
            const dueDateReminders = document.getElementById('dueDateReminders').checked;
            const newBookAlerts = document.getElementById('newBookAlerts').checked;
            const theme = document.getElementById('theme').value;
            const language = document.getElementById('language').value;

            // Validate required fields
            if (!firstName || !lastName || !email) {
                alert('Please fill in all required fields');
                return;
            }

            // Validate password if provided
            if (newPassword && newPassword !== confirmPassword) {
                alert('Passwords do not match');
                return;
            }

            // Validate email format
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address');
                return;
            }

            // Here you would typically send the data to your server
            alert('Profile updated successfully!');
            
            // Reset password fields
            document.getElementById('newPassword').value = '';
            document.getElementById('confirmPassword').value = '';
        }

        // Theme switching
        document.getElementById('theme').addEventListener('change', function() {
            const theme = this.value;
            const body = document.body;
            
            if (theme === 'dark') {
                body.style.backgroundColor = '#1a1a1a1';
                body.style.color = '#ffffff';
            } else {
                body.style.backgroundColor = '#ffffff';
                body.style.color = '#333333';
            }
        });

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
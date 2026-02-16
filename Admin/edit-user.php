<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - BookYard Admin</title>
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
            background-color: var(--bg-light);
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
            border-right: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
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
            background-color: rgba(255, 255, 255, 0.2);
            border-left-color: var(--accent-color);
            padding-left: 25px;
        }

        .menu-item.active {
            background-color: rgba(255, 255, 255, 0.25);
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
            background-color: var(--bg-light);
            color: #ffffff;
        }

        .top-bar {
            background: #000000;
            border: 1px solid #ffffff;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
            margin-bottom: 30px;
            display: flex;
            color: #ffffff;
        }

        .content-card {
            background: #000000;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-section h5 {
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--accent-color);
        }

        .form-label {
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px 15px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            padding: 10px 25px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            padding: 10px 25px;
            border-radius: 8px;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            padding: 10px 25px;
            border-radius: 8px;
        }

        .user-avatar-preview {
            width: 120px;
            height: 120px;
            border: 2px dashed #ddd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            background-color: #f8f9fa;
            overflow: hidden;
        }

        .user-avatar-preview img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 50%;
        }

        .user-info-badge {
            background-color: #e3f2fd;
            color: #1976d2;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-active {
            background-color: #d4edda;
            color: #155724;
        }

        .status-inactive {
            background-color: #f8d7da;
            color: #721c24;
        }

        .status-suspended {
            background-color: #fff3cd;
            color: #856404;
        }

        .role-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .role-admin {
            background-color: #e3f2fd;
            color: #1976d2;
        }

        .role-librarian {
            background-color: #f3e5f5;
            color: #9c27b0;
        }

        .role-member {
            background-color: #e8f5e8;
            color: #4caf50;
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
            <a href="profile.php" class="menu-item">
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
            <h1>Edit User</h1>
            <div>
                <a href="manage-users.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Users
                </a>
            </div>
        </div>

        <div class="content-card">
            <div class="user-info-badge">
                <i class="fas fa-info-circle"></i> 
                <strong>Editing User ID:</strong> #USR001 | 
                <strong>Current Status:</strong> <span class="status-badge status-active">Active</span> |
                <strong>Role:</strong> <span class="role-badge role-admin">Admin</span>
            </div>

            <form id="editUserForm" onsubmit="return validateForm()">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-section">
                            <h5><i class="fas fa-user"></i> Personal Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" value="John" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" value="Doe" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" name="email" value="john.doe@email.com" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="+1 234-567-8900">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dateOfBirth" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="1990-05-15">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5><i class="fas fa-map-marker-alt"></i> Address Information</h5>
                            <div class="mb-3">
                                <label for="address" class="form-label">Street Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="123 Main Street">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="New York">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state" class="form-label">State/Province</label>
                                    <input type="text" class="form-control" id="state" name="state" value="NY">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="postalCode" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" id="postalCode" name="postalCode" value="10001">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country" class="form-label">Country</label>
                                    <select class="form-select" id="country" name="country">
                                        <option value="">Select Country</option>
                                        <option value="US" selected>United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="AU">Australia</option>
                                        <option value="IN">India</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5><i class="fas fa-lock"></i> Account Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="username" class="form-label">Username *</label>
                                    <input type="text" class="form-control" id="username" name="username" value="johndoe" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="role" class="form-label">User Role *</label>
                                    <select class="form-select" id="role" name="role" required>
                                        <option value="">Select Role</option>
                                        <option value="admin" selected>Admin</option>
                                        <option value="librarian">Librarian</option>
                                        <option value="member">Member</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label">Account Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="suspended">Suspended</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="membershipExpiry" class="form-label">Membership Expiry</label>
                                    <input type="date" class="form-control" id="membershipExpiry" name="membershipExpiry" value="2025-01-10">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-section">
                            <h5><i class="fas fa-camera"></i> Profile Picture</h5>
                            <div class="user-avatar-preview" id="avatarPreview">
                                <img src="https://picsum.photos/seed/user1/120/120.jpg" alt="User Avatar">
                            </div>
                            <div class="mb-3">
                                <label for="userAvatar" class="form-label">Change Profile Picture</label>
                                <input type="file" class="form-control" id="userAvatar" name="userAvatar" accept="image/*" onchange="previewAvatar(event)">
                                <small class="text-muted">Leave empty to keep current picture</small>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5><i class="fas fa-cog"></i> Account Settings</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="emailNotifications" name="emailNotifications" checked>
                                <label class="form-check-label" for="emailNotifications">
                                    Email Notifications
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="smsNotifications" name="smsNotifications">
                                <label class="form-check-label" for="smsNotifications">
                                    SMS Notifications
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="twoFactorAuth" name="twoFactorAuth">
                                <label class="form-check-label" for="twoFactorAuth">
                                    Two-Factor Authentication
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="allowLogin" name="allowLogin" checked>
                                <label class="form-check-label" for="allowLogin">
                                    Allow Login Access
                                </label>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5><i class="fas fa-history"></i> User Activity</h5>
                            <div class="small">
                                <p><strong>Member Since:</strong> 2024-01-10</p>
                                <p><strong>Last Login:</strong> 2024-01-25 14:30</p>
                                <p><strong>Total Books Issued:</strong> 23</p>
                                <p><strong>Current Issues:</strong> 2</p>
                                <p><strong>Overdue Returns:</strong> 0</p>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5><i class="fas fa-info-circle"></i> Additional Notes</h5>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes</label>
                                <textarea class="form-control" id="notes" name="notes" rows="4">System administrator with full access privileges. Responsible for user management and system configuration.</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <div>
                                <button type="button" class="btn btn-danger" onclick="deleteUser()">
                                    <i class="fas fa-trash"></i> Delete User
                                </button>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-secondary" onclick="resetForm()">
                                    <i class="fas fa-redo"></i> Reset Changes
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update User
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function previewAvatar(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('avatarPreview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="User Avatar">`;
                }
                reader.readAsDataURL(file);
            }
        }

        function validateForm() {
            const form = document.getElementById('editUserForm');
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            // Validate email format
            const email = document.getElementById('email').value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                document.getElementById('email').classList.add('is-invalid');
                isValid = false;
            }

            if (isValid) {
                alert('User updated successfully!');
                // Here you would typically submit the form to the server
            }

            return false; // Prevent actual form submission for demo
        }

        function resetForm() {
            if (confirm('Are you sure you want to reset all changes?')) {
                location.reload();
            }
        }

        function deleteUser() {
            if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
                alert('User deleted successfully!');
                window.location.href = 'manage-users.php';
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
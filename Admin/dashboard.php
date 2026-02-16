<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BookYard Admin</title>
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
            <a href="dashboard.php" class="menu-item active">
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
            <h1 class = "Heading text-center">Dashboard</h1>
            <div>
                <span >Welcome, Admin</span>
                <i class="fas fa-user-circle ms-2" style="font-size: 1.5rem;"></i>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon books">
                    <i class="fas fa-book"></i>
                </div>
                <div class="stat-value">1,234</div>
                <div class="stat-label">Total Books</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon users">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-value">567</div>
                <div class="stat-label">Total Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon issued">
                    <i class="fas fa-hand-holding"></i>
                </div>
                <div class="stat-value">89</div>
                <div class="stat-label">Books Issued</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon categories">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="stat-value">12</div>
                <div class="stat-label">Categories</div>
            </div>
        </div>

        <div class="content-card">
            <h5 class="mb-3">Recent Activity</h5>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Activity</th>
                            <th>User</th>
                            <th>Book</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><i class="fas fa-hand-holding text-success"></i> Book Issued</td>
                            <td>John Doe</td>
                            <td>The Great Gatsby</td>
                            <td>2024-01-15</td>
                            <td><span class="badge bg-success">Active</span></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-undo text-info"></i> Book Returned</td>
                            <td>Jane Smith</td>
                            <td>1984</td>
                            <td>2024-01-14</td>
                            <td><span class="badge bg-info">Completed</span></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-plus text-primary"></i> New Book Added</td>
                            <td>Admin</td>
                            <td>To Kill a Mockingbird</td>
                            <td>2024-01-13</td>
                            <td><span class="badge bg-primary">Added</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
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
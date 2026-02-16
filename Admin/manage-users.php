<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - BookYard Admin</title>
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
            <a href="manage-users.php" class="menu-item active">
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
            <h1>Manage Users</h1>
            <div>
                <a href="add-user.php" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New User
                </a>
            </div>
        </div>

        <div class="content-card pt-5px mt-5px">
            <div class="search-bar pt-5px  mt-5px">
                <input type="text" class="form-control" placeholder="Search users by name, email, or ID..." id="searchInput">
                <div class="d-flex justify-content spacebetween">

                    <select class="form-select" style="max-width: 150px;" id="roleFilter">
                        <option value="">All Roles</option>
                        <option value="admin">Admin</option>
                        <option value="librarian">Librarian</option>
                        <option value="member">Member</option>
                    </select>
                    <select class="form-select" style="max-width: 150px;" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="suspended">Suspended</option>
                    </select>
                </div>
            </div>

            <div class="user-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>User ID</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <img src="https://picsum.photos/seed/user1/40/40.jpg" alt="User" class="user-avatar">
                                    <span>John Doe</span>
                                </div>
                            </td>
                            <td>#USR001</td>
                            <td>john.doe@email.com</td>
                            <td>+1 234-567-8900</td>
                            <td><span class="role-badge role-admin">Admin</span></td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>2024-01-10</td>
                            <td>
                                <button class="btn-action btn-edit" onclick="editUser('USR001')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action btn-suspend" onclick="suspendUser('USR001')">
                                    <i class="fas fa-pause"></i>
                                </button>
                                <button class="btn-action btn-delete" onclick="deleteUser('USR001')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <img src="https://picsum.photos/seed/user2/40/40.jpg" alt="User" class="user-avatar">
                                    <span>Jane Smith</span>
                                </div>
                            </td>
                            <td>#USR002</td>
                            <td>jane.smith@email.com</td>
                            <td>+1 234-567-8901</td>
                            <td><span class="role-badge role-librarian">Librarian</span></td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>2024-01-12</td>
                            <td>
                                <button class="btn-action btn-edit" onclick="editUser('USR002')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action btn-suspend" onclick="suspendUser('USR002')">
                                    <i class="fas fa-pause"></i>
                                </button>
                                <button class="btn-action btn-delete" onclick="deleteUser('USR002')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <img src="https://picsum.photos/seed/user3/40/40.jpg" alt="User" class="user-avatar">
                                    <span>Robert Johnson</span>
                                </div>
                            </td>
                            <td>#USR003</td>
                            <td>robert.j@email.com</td>
                            <td>+1 234-567-8902</td>
                            <td><span class="role-badge role-member">Member</span></td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>2024-01-15</td>
                            <td>
                                <button class="btn-action btn-edit" onclick="editUser('USR003')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action btn-suspend" onclick="suspendUser('USR003')">
                                    <i class="fas fa-pause"></i>
                                </button>
                                <button class="btn-action btn-delete" onclick="deleteUser('USR003')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <img src="https://picsum.photos/seed/user4/40/40.jpg" alt="User" class="user-avatar">
                                    <span>Emily Davis</span>
                                </div>
                            </td>
                            <td>#USR004</td>
                            <td>emily.davis@email.com</td>
                            <td>+1 234-567-8903</td>
                            <td><span class="role-badge role-member">Member</span></td>
                            <td><span class="status-badge status-suspended">Suspended</span></td>
                            <td>2024-01-18</td>
                            <td>
                                <button class="btn-action btn-edit" onclick="editUser('USR004')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action btn-edit" onclick="activateUser('USR004')" style="background-color: #28a745;">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="btn-action btn-delete" onclick="deleteUser('USR004')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <img src="https://picsum.photos/seed/user5/40/40.jpg" alt="User" class="user-avatar">
                                    <span>Michael Wilson</span>
                                </div>
                            </td>
                            <td>#USR005</td>
                            <td>michael.w@email.com</td>
                            <td>+1 234-567-8904</td>
                            <td><span class="role-badge role-member">Member</span></td>
                            <td><span class="status-badge status-inactive">Inactive</span></td>
                            <td>2024-01-20</td>
                            <td>
                                <button class="btn-action btn-edit" onclick="editUser('USR005')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action btn-edit" onclick="activateUser('USR005')" style="background-color: #28a745;">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="btn-action btn-delete" onclick="deleteUser('USR005')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <img src="https://picsum.photos/seed/user6/40/40.jpg" alt="User" class="user-avatar">
                                    <span>Sarah Brown</span>
                                </div>
                            </td>
                            <td>#USR006</td>
                            <td>sarah.brown@email.com</td>
                            <td>+1 234-567-8905</td>
                            <td><span class="role-badge role-librarian">Librarian</span></td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>2024-01-22</td>
                            <td>
                                <button class="btn-action btn-edit" onclick="editUser('USR006')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action btn-suspend" onclick="suspendUser('USR006')">
                                    <i class="fas fa-pause"></i>
                                </button>
                                <button class="btn-action btn-delete" onclick="deleteUser('USR006')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function editUser(userId) {
            window.location.href = `edit-user.php?id=${userId}`;
        }

        function suspendUser(userId) {
            if (confirm('Are you sure you want to suspend this user?')) {
                alert(`User ${userId} suspended successfully!`);
                // Here you would typically make an API call to suspend the user
                location.reload();
            }
        }

        function activateUser(userId) {
            if (confirm('Are you sure you want to activate this user?')) {
                alert(`User ${userId} activated successfully!`);
                // Here you would typically make an API call to activate the user
                location.reload();
            }
        }

        function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
                alert(`User ${userId} deleted successfully!`);
                // Here you would typically make an API call to delete the user
                location.reload();
            }
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Filter functionality
        document.getElementById('roleFilter').addEventListener('change', filterTable);
        document.getElementById('statusFilter').addEventListener('change', filterTable);

        function filterTable() {
            const roleFilter = document.getElementById('roleFilter').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const role = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
                const status = row.querySelector('td:nth-child(6)').textContent.toLowerCase();
                
                const roleMatch = !roleFilter || role.includes(roleFilter);
                const statusMatch = !statusFilter || status.includes(statusFilter);
                
                row.style.display = roleMatch && statusMatch ? '' : 'none';
            });
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
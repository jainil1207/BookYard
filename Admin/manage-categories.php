<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories - BookYard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #000000;
            --secondary-color: #333333;
            --accent-color: black;
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
            background: #ffffff;
            border: 1px solid #ffffff;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
            margin-bottom: 30px;
            display: flex;
            color: #000000ff;
            justify-content: space-between;
            align-items: center;
        }

        .content-card {
            background: #e5cacaff;
            padding: 25px;
            margin: 5px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .category-card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 20px;
            transition: all 0.3s ease;
            position: relative;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .category-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .category-icon.fiction {
            background-color: #e3f2fd;
            color: #2196f3;
        }

        .category-icon.non-fiction {
            background-color: #f3e5f5;
            color: #9c27b0;
        }

        .category-icon.science {
            background-color: #e8f5e8;
            color: #4caf50;
        }

        .category-icon.technology {
            background-color: #fff3e0;
            color: #ff9800;
        }

        .category-icon.history {
            background-color: #fce4ec;
            color: #e91e63;
        }

        .category-icon.business {
            background-color: #e0f2f1;
            color: #009688;
        }

        .category-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .category-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent-color);
        }

        .stat-label {
            font-size: 0.8rem;
            color: #666;
        }

        .category-actions {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            flex: 1;
            padding: 8px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 0.9rem;
        }

        .btn-edit {
            background-color: #ffc107;
            color: white;
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .add-category-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: var(--accent-color);
            color: white;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
            transition: all 0.3s ease;
            z-index: 100;
        }

        .add-category-btn:hover {
            background-color: #2980b9;
            transform: scale(1.1);
        }

        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            background-color: var(--primary-color);
            color: white;
            border-radius: 10px 10px 0 0;
        }

        .search-bar {
            margin-bottom: 20px;
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

            .category-grid {
                grid-template-columns: 1fr;
            }

            .add-category-btn {
                bottom: 20px;
                right: 20px;
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
            <a href="manage-categories.php" class="menu-item active">
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
            <h1>Manage Categories</h1>
            <div>
                <span class="me-3">Total Categories: <strong>6</strong></span>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    <i class="fas fa-plus"></i> Add Category
                </button>
            </div>
        </div>

        <div class="content-card">
            <div class="search-bar">
                <input type="text" class="form-control" placeholder="Search categories..." id="searchInput">
            </div>

            <div class="category-grid" id="categoryGrid">
                <div class="category-card">
                    <div class="category-icon fiction">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="category-name">Fiction</div>
                    <div class="category-stats">
                        <div class="stat-item">
                            <div class="stat-value">245</div>
                            <div class="stat-label">Books</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">89</div>
                            <div class="stat-label">Issued</div>
                        </div>
                    </div>
                    <div class="category-actions">
                        <button class="btn-action btn-edit" onclick="editCategory('fiction')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action btn-delete" onclick="deleteCategory('fiction')">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-icon non-fiction">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="category-name">Non-Fiction</div>
                    <div class="category-stats">
                        <div class="stat-item">
                            <div class="stat-value">189</div>
                            <div class="stat-label">Books</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">67</div>
                            <div class="stat-label">Issued</div>
                        </div>
                    </div>
                    <div class="category-actions">
                        <button class="btn-action btn-edit" onclick="editCategory('non-fiction')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action btn-delete" onclick="deleteCategory('non-fiction')">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-icon science">
                        <i class="fas fa-flask"></i>
                    </div>
                    <div class="category-name">Science</div>
                    <div class="category-stats">
                        <div class="stat-item">
                            <div class="stat-value">134</div>
                            <div class="stat-label">Books</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">45</div>
                            <div class="stat-label">Issued</div>
                        </div>
                    </div>
                    <div class="category-actions">
                        <button class="btn-action btn-edit" onclick="editCategory('science')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action btn-delete" onclick="deleteCategory('science')">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-icon technology">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <div class="category-name">Technology</div>
                    <div class="category-stats">
                        <div class="stat-item">
                            <div class="stat-value">156</div>
                            <div class="stat-label">Books</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">78</div>
                            <div class="stat-label">Issued</div>
                        </div>
                    </div>
                    <div class="category-actions">
                        <button class="btn-action btn-edit" onclick="editCategory('technology')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action btn-delete" onclick="deleteCategory('technology')">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-icon history">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <div class="category-name">History</div>
                    <div class="category-stats">
                        <div class="stat-item">
                            <div class="stat-value">98</div>
                            <div class="stat-label">Books</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">34</div>
                            <div class="stat-label">Issued</div>
                        </div>
                    </div>
                    <div class="category-actions">
                        <button class="btn-action btn-edit" onclick="editCategory('history')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action btn-delete" onclick="deleteCategory('history')">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-icon business">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="category-name">Business</div>
                    <div class="category-stats">
                        <div class="stat-item">
                            <div class="stat-value">112</div>
                            <div class="stat-label">Books</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">56</div>
                            <div class="stat-label">Issued</div>
                        </div>
                    </div>
                    <div class="category-actions">
                        <button class="btn-action btn-edit" onclick="editCategory('business')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action btn-delete" onclick="deleteCategory('business')">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus"></i> Add New Category</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addCategoryForm">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name *</label>
                            <input type="text" class="form-control" id="categoryName" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="categoryDescription" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="categoryIcon" class="form-label">Icon</label>
                            <select class="form-select" id="categoryIcon">
                                <option value="fa-book">📚 Book</option>
                                <option value="fa-newspaper">📰 Newspaper</option>
                                <option value="fa-flask">🧪 Flask</option>
                                <option value="fa-laptop-code">💻 Laptop</option>
                                <option value="fa-landmark">🏛️ Landmark</option>
                                <option value="fa-briefcase">💼 Briefcase</option>
                                <option value="fa-heart">❤️ Heart</option>
                                <option value="fa-star">⭐ Star</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="categoryColor" class="form-label">Color</label>
                            <select class="form-select" id="categoryColor">
                                <option value="#2196f3">Blue</option>
                                <option value="#9c27b0">Purple</option>
                                <option value="#4caf50">Green</option>
                                <option value="#ff9800">Orange</option>
                                <option value="#e91e63">Pink</option>
                                <option value="#009688">Teal</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="addCategory()">
                        <i class="fas fa-save"></i> Add Category
                    </button>
                </div>
            </div>
        </div>
    </div>

    <button class="add-category-btn" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
        <i class="fas fa-plus"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function editCategory(categoryId) {
            alert(`Edit category: ${categoryId}`);
            // Here you would typically open an edit modal or navigate to edit page
        }

        function deleteCategory(categoryId) {
            if (confirm(`Are you sure you want to delete the "${categoryId}" category? This will affect all books in this category.`)) {
                alert(`Category "${categoryId}" deleted successfully!`);
                // Here you would typically make an API call to delete the category
                location.reload();
            }
        }

        function addCategory() {
            const name = document.getElementById('categoryName').value;
            const description = document.getElementById('categoryDescription').value;
            const icon = document.getElementById('categoryIcon').value;
            const color = document.getElementById('categoryColor').value;

            if (!name.trim()) {
                alert('Please enter a category name');
                return;
            }

            alert(`Category "${name}" added successfully!`);
            // Here you would typically make an API call to add the category
            location.reload();
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const categoryCards = document.querySelectorAll('.category-card');
            
            categoryCards.forEach(card => {
                const categoryName = card.querySelector('.category-name').textContent.toLowerCase();
                card.style.display = categoryName.includes(searchTerm) ? '' : 'none';
            });
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book - BookYard Admin</title>
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
            justify-content: space-between;
            align-items: center;
        }

        .content-card {
            background: #ffffff;
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

        .book-cover-preview {
            width: 150px;
            height: 200px;
            border: 2px dashed #ddd;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            background-color: #f8f9fa;
            overflow: hidden;
        }

        .book-cover-preview img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 6px;
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

        .book-info-badge {
            background-color: #e3f2fd;
            color: #1976d2;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
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
            <h1>Edit Book</h1>
            <div>
                <a href="manage-books.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Books
                </a>
            </div>
        </div>

        <div class="content-card">
            <div class="book-info-badge">
                <i class="fas fa-info-circle"></i> 
                <strong>Editing Book ID:</strong> #001 | 
                <strong>Current Status:</strong> <span class="badge bg-success">Available</span>
            </div>

            <form id="editBookForm" onsubmit="return validateForm()">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-section">
                            <h5><i class="fas fa-info-circle"></i> Basic Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="bookTitle" class="form-label">Book Title *</label>
                                    <input type="text" class="form-control" id="bookTitle" name="bookTitle" value="The Great Gatsby" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="bookAuthor" class="form-label">Author *</label>
                                    <input type="text" class="form-control" id="bookAuthor" name="bookAuthor" value="F. Scott Fitzgerald" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="isbn" class="form-label">ISBN *</label>
                                    <input type="text" class="form-control" id="isbn" name="isbn" value="978-0-7432-7356-5" pattern="[0-9-]+" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="publisher" class="form-label">Publisher</label>
                                    <input type="text" class="form-control" id="publisher" name="publisher" value="Scribner">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="category" class="form-label">Category *</label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="">Select Category</option>
                                        <option value="fiction" selected>Fiction</option>
                                        <option value="non-fiction">Non-Fiction</option>
                                        <option value="science">Science</option>
                                        <option value="technology">Technology</option>
                                        <option value="history">History</option>
                                        <option value="business">Business</option>
                                        <option value="self-help">Self-Help</option>
                                        <option value="biography">Biography</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="language" class="form-label">Language</label>
                                    <select class="form-select" id="language" name="language">
                                        <option value="english" selected>English</option>
                                        <option value="spanish">Spanish</option>
                                        <option value="french">French</option>
                                        <option value="german">German</option>
                                        <option value="chinese">Chinese</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="publicationYear" class="form-label">Publication Year</label>
                                    <input type="number" class="form-control" id="publicationYear" name="publicationYear" value="1925" min="1000" max="2024">
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5><i class="fas fa-align-left"></i> Additional Details</h5>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4">The Great Gatsby is a 1925 novel by American writer F. Scott Fitzgerald. Set in the Jazz Age on Long Island, the novel depicts narrator Nick Carraway's interactions with mysterious millionaire Jay Gatsby and Gatsby's obsession to reunite with his former lover, Daisy Buchanan.</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="pages" class="form-label">Number of Pages</label>
                                    <input type="number" class="form-control" id="pages" name="pages" value="180" min="1">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="copies" class="form-label">Number of Copies *</label>
                                    <input type="number" class="form-control" id="copies" name="copies" value="5" min="1" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="location" class="form-label">Shelf Location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="A1-B2">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Price ($)</label>
                                    <input type="number" class="form-control" id="price" name="price" value="12.99" min="0" step="0.01">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-section">
                            <h5><i class="fas fa-image"></i> Book Cover</h5>
                            <div class="book-cover-preview" id="coverPreview">
                                <img src="https://picsum.photos/seed/gatsby/150/200.jpg" alt="Current Book Cover">
                            </div>
                            <div class="mb-3">
                                <label for="bookCover" class="form-label">Change Cover Image</label>
                                <input type="file" class="form-control" id="bookCover" name="bookCover" accept="image/*" onchange="previewCover(event)">
                                <small class="text-muted">Leave empty to keep current cover</small>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5><i class="fas fa-tags"></i> Tags</h5>
                            <div class="mb-3">
                                <label for="tags" class="form-label">Book Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags" value="classic, literature, romance, american">
                                <small class="text-muted">Separate tags with commas</small>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5><i class="fas fa-cog"></i> Settings</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="featured" name="featured" checked>
                                <label class="form-check-label" for="featured">
                                    Featured Book
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="available" name="available" checked>
                                <label class="form-check-label" for="available">
                                    Available for Issue
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="reservation" name="reservation" checked>
                                <label class="form-check-label" for="reservation">
                                    Allow Reservation
                                </label>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5><i class="fas fa-history"></i> Book History</h5>
                            <div class="small">
                                <p><strong>Added:</strong> 2024-01-10 by Admin</p>
                                <p><strong>Last Modified:</strong> 2024-01-15 by Admin</p>
                                <p><strong>Total Issues:</strong> 23 times</p>
                                <p><strong>Current Issues:</strong> 0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <div>
                                <button type="button" class="btn btn-danger" onclick="deleteBook()">
                                    <i class="fas fa-trash"></i> Delete Book
                                </button>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-secondary" onclick="resetForm()">
                                    <i class="fas fa-redo"></i> Reset Changes
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Book
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

        function previewCover(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('coverPreview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="New Book Cover">`;
                }
                reader.readAsDataURL(file);
            }
        }

        function validateForm() {
            const form = document.getElementById('editBookForm');
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

            // Validate ISBN format
            const isbn = document.getElementById('isbn').value;
            const isbnPattern = /^[\d-]+$/;
            if (!isbnPattern.test(isbn)) {
                document.getElementById('isbn').classList.add('is-invalid');
                isValid = false;
            }

            if (isValid) {
                alert('Book updated successfully!');
                // Here you would typically submit the form to the server
            }

            return false; // Prevent actual form submission for demo
        }

        function resetForm() {
            if (confirm('Are you sure you want to reset all changes?')) {
                location.reload();
            }
        }

        function deleteBook() {
            if (confirm('Are you sure you want to delete this book? This action cannot be undone.')) {
                alert('Book deleted successfully!');
                window.location.href = 'manage-books.php';
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
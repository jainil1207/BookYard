<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book - BookYard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="admin.css" rel="stylesheet">
        
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
            <a href="add-book.php" class="menu-item active">
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
            <h1>Add New Book</h1>
            <div>
                <a href="manage-books.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Books
                </a>
            </div>
        </div>

        <div class="content-card">
            <form id="addBookForm" onsubmit="return validateForm()">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-section">
                            <h5><i class="fas fa-info-circle"></i> Basic Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="bookTitle" class="form-label">Book Title *</label>
                                    <input type="text" class="form-control" id="bookTitle" name="bookTitle" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="bookAuthor" class="form-label">Author *</label>
                                    <input type="text" class="form-control" id="bookAuthor" name="bookAuthor" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="isbn" class="form-label">ISBN *</label>
                                    <input type="text" class="form-control" id="isbn" name="isbn" pattern="[0-9-]+" placeholder="978-0-7432-7356-5" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="publisher" class="form-label">Publisher</label>
                                    <input type="text" class="form-control" id="publisher" name="publisher">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="category" class="form-label">Category *</label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="">Select Category</option>
                                        <option value="fiction">Fiction</option>
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
                                        <option value="english">English</option>
                                        <option value="spanish">Spanish</option>
                                        <option value="french">French</option>
                                        <option value="german">German</option>
                                        <option value="chinese">Chinese</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="publicationYear" class="form-label">Publication Year</label>
                                    <input type="number" class="form-control" id="publicationYear" name="publicationYear" min="1000" max="2024">
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5><i class="fas fa-align-left"></i> Additional Details</h5>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter book description..."></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="pages" class="form-label">Number of Pages</label>
                                    <input type="number" class="form-control" id="pages" name="pages" min="1">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="copies" class="form-label">Number of Copies *</label>
                                    <input type="number" class="form-control" id="copies" name="copies" min="1" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="location" class="form-label">Shelf Location</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="e.g., A1-B2">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Price ($)</label>
                                    <input type="number" class="form-control" id="price" name="price" min="0" step="0.01">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-section">
                            <h5><i class="fas fa-image"></i> Book Cover</h5>
                            <div class="book-cover-preview" id="coverPreview">
                                <i class="fas fa-book fa-3x text-muted"></i>
                            </div>
                            <div class="mb-3">
                                <label for="bookCover" class="form-label">Upload Cover Image</label>
                                <input type="file" class="form-control" id="bookCover" name="bookCover" accept="image/*" onchange="previewCover(event)">
                                <small class="text-muted">Allowed formats: JPG, PNG, GIF (Max 5MB)</small>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5><i class="fas fa-tags"></i> Tags</h5>
                            <div class="mb-3">
                                <label for="tags" class="form-label">Book Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags" placeholder="e.g., classic, literature, bestseller">
                                <small class="text-muted">Separate tags with commas</small>
                            </div>
                        </div>

                        <div class="form-section">
                            <h5><i class="fas fa-cog"></i> Settings</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="featured" name="featured">
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
                                <input class="form-check-input" type="checkbox" id="reservation" name="reservation">
                                <label class="form-check-label" for="reservation">
                                    Allow Reservation
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary" onclick="resetForm()">
                                <i class="fas fa-redo"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-dark       ">
                                <i class="fas fa-save"></i> Add Book
                            </button>
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
                    preview.innerHTML = `<img src="${e.target.result}" alt="Book Cover">`;
                }
                reader.readAsDataURL(file);
            }
        }

        function validateForm() {
            const form = document.getElementById('addBookForm');
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
                alert('Book added successfully!');
                // Here you would typically submit the form to the server
                form.reset();
                document.getElementById('coverPreview').innerHTML = '<i class="fas fa-book fa-3x text-muted"></i>';
            }

            return false; // Prevent actual form submission for demo
        }

        function resetForm() {
            if (confirm('Are you sure you want to reset the form?')) {
                document.getElementById('addBookForm').reset();
                document.getElementById('coverPreview').innerHTML = '<i class="fas fa-book fa-3x text-muted"></i>';
                // Remove any validation classes
                document.querySelectorAll('.is-invalid').forEach(field => {
                    field.classList.remove('is-invalid');
                });
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
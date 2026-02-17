<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Books - BookYard Admin</title>
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
            background-color: white;
            color: #ffffff;
        }

        .top-bar {
            background: #ffffffff;
            border: 1px solid black;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
            margin-bottom: 30px;
            display: flex;
           justify-content: space-between;
            color: black
        }

        .content-card {
            background:white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border: 2px solid black;
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
            border: 1px solid black;
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

        .book-card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .book-card:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .book-card.selected {
            border-color: var(--accent-color);
            background-color: #f0f8ff;
        }

        .book-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .book-cover {
            width: 60px;
            height: 80px;
            border-radius: 5px;
            object-fit: cover;
        }

        .book-details h6 {
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .book-details p {
            margin: 0;
            font-size: 0.9rem;
            color: #666;
        }

        .user-search {
            position: relative;
        }

        .user-suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 8px 8px;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
        }

        .user-suggestion {
            padding: 10px 15px;
            cursor: pointer;
            border-bottom: 1px solid #f0f0f0;
        }

        .user-suggestion:hover {
            background-color: #f8f9fa;
        }

        .user-suggestion:last-child {
            border-bottom: none;
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
        .left{

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
            <a href="issue-books.php" class="menu-item active">
                <i class="fas fa-hand-holding"></i> Issue Books
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
            <a href="return-books.php" class="menu-item">
                <i class="fas fa-undo"></i> Return Books
            </a>
        </nav>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <h1>Issue Books</h1>
            <div class="left">
                <a href="return-books.php" class="btn btn-secondary">
                    <i class="fas fa-undo"></i> Return Books
                </a>
            </div>
        </div>

        <div class="content-card">
            <form id="issueBookForm" onsubmit="return validateForm()">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-section">
                            <h5><i class="fas fa-user"></i> User Information</h5>
                            <div class="mb-3">
                                <label for="userSearch" class="form-label">Search User *</label>
                                <div class="user-search">
                                    <input type="text" class="form-control" id="userSearch" name="userSearch" placeholder="Search by name, email, or ID..." required oninput="searchUsers()">
                                    <div class="user-suggestions" id="userSuggestions"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="selectedUser" class="form-label">Selected User</label>
                                <div class="alert alert-info" id="selectedUserInfo" style="display: none;">
                                    <i class="fas fa-user"></i> <span id="selectedUserName"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="userId" class="form-label">User ID</label>
                                    <input type="text" class="form-control" id="userId" name="userId" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="memberType" class="form-label">Member Type</label>
                                    <input type="text" class="form-control" id="memberType" name="memberType" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="currentIssues" class="form-label">Current Issues</label>
                                <input type="text" class="form-control" id="currentIssues" name="currentIssues" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-section">
                            <h5><i class="fas fa-book"></i> Book Selection</h5>
                            <div class="mb-3">
                                <label for="bookSearch" class="form-label">Search Book *</label>
                                <input type="text" class="form-control" id="bookSearch" name="bookSearch" placeholder="Search by title, author, or ISBN..." required oninput="searchBooks()">
                            </div>
                            <div id="bookResults" style="max-height: 300px; overflow-y: auto;">
                                <!-- Book results will be populated here -->
                            </div>
                            <!-- <div class="mt-3">
                                <label for="selectedBook" class="form-label">Selected Book</label>
                                <div class="alert alert-success" id="selectedBookInfo" style="display: none;">
                                    <i class="fas fa-book"></i> <span id="selectedBookTitle"></span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h5><i class="fas fa-cog"></i> Issue Details</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="issueDate" class="form-label">Issue Date *</label>
                            <input type="date" class="form-control" id="issueDate" name="issueDate" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="dueDate" class="form-label">Due Date *</label>
                            <input type="date" class="form-control" id="dueDate" name="dueDate" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="issueType" class="form-label">Issue Type</label>
                            <select class="form-select" id="issueType" name="issueType">
                                <option value="normal">Normal Issue</option>
                                <option value="reservation">Reservation Pickup</option>
                                <option value="renewal">Renewal</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="finePerDay" class="form-label">Fine per Day ($)</label>
                            <input type="number" class="form-control" id="finePerDay" name="finePerDay" value="0.50" step="0.01" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="maxRenewals" class="form-label">Max Renewals</label>
                            <input type="number" class="form-control" id="maxRenewals" name="maxRenewals" value="2" min="0">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Add any notes about this issue..."></textarea>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary" onclick="resetForm()">
                                <i class="fas fa-redo"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-hand-holding"></i> Issue Book
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample data
        const users = [
            { id: 'USR001', name: 'John Doe', email: 'john.doe@email.com', type: 'Admin', currentIssues: 2 },
            { id: 'USR002', name: 'Jane Smith', email: 'jane.smith@email.com', type: 'Librarian', currentIssues: 1 },
            { id: 'USR003', name: 'Robert Johnson', email: 'robert.j@email.com', type: 'Member', currentIssues: 3 },
            { id: 'USR004', name: 'Emily Davis', email: 'emily.davis@email.com', type: 'Member', currentIssues: 0 },
            { id: 'USR005', name: 'Michael Wilson', email: 'michael.w@email.com', type: 'Member', currentIssues: 1 }
        ];

        const books = [
            { id: 'B001', title: 'The Great Gatsby', author: 'F. Scott Fitzgerald', isbn: '978-0-7432-7356-5', available: true },
            { id: 'B002', title: '1984', author: 'George Orwell', isbn: '978-0-452-28423-4', available: true },
            { id: 'B003', title: 'To Kill a Mockingbird', author: 'Harper Lee', isbn: '978-0-06-112008-4', available: false },
            { id: 'B004', title: 'Sapiens', author: 'Yuval Noah Harari', isbn: '978-0-06-231609-7', available: true },
            { id: 'B005', title: 'The Lean Startup', author: 'Eric Ries', isbn: '978-0-307-88789-4', available: true }
        ];

        let selectedUser = null;
        let selectedBook = null;

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function searchUsers() {
            const searchTerm = document.getElementById('userSearch').value.toLowerCase();
            const suggestions = document.getElementById('userSuggestions');
            
            if (searchTerm.length < 2) {
                suggestions.style.display = 'none';
                return;
            }

            const filteredUsers = users.filter(user => 
                user.name.toLowerCase().includes(searchTerm) ||
                user.email.toLowerCase().includes(searchTerm) ||
                user.id.toLowerCase().includes(searchTerm)
            );

            if (filteredUsers.length > 0) {
                suggestions.innerHTML = filteredUsers.map(user => `
                    <div class="user-suggestion" onclick="selectUser('${user.id}')">
                        <strong>${user.name}</strong> - ${user.email} (${user.id})
                    </div>
                `).join('');
                suggestions.style.display = 'block';
            } else {
                suggestions.innerHTML = '<div class="user-suggestion">No users found</div>';
                suggestions.style.display = 'block';
            }
        }

        function selectUser(userId) {
            selectedUser = users.find(user => user.id === userId);
            if (selectedUser) {
                document.getElementById('userSearch').value = selectedUser.name;
                document.getElementById('userId').value = selectedUser.id;
                document.getElementById('memberType').value = selectedUser.type;
                document.getElementById('currentIssues').value = selectedUser.currentIssues;
                document.getElementById('selectedUserName').textContent = `${selectedUser.name} (${selectedUser.id})`;
                document.getElementById('selectedUserInfo').style.display = 'block';
                document.getElementById('userSuggestions').style.display = 'none';
            }
        }

        function searchBooks() {
            const searchTerm = document.getElementById('bookSearch').value.toLowerCase();
            const results = document.getElementById('bookResults');
            
            if (searchTerm.length < 2) {
                results.innerHTML = '';
                return;
            }

            const filteredBooks = books.filter(book => 
                book.title.toLowerCase().includes(searchTerm) ||
                book.author.toLowerCase().includes(searchTerm) ||
                book.isbn.includes(searchTerm)
            );

            if (filteredBooks.length > 0) {
                results.innerHTML = filteredBooks.map(book => `
                    <div class="book-card ${!book.available ? 'disabled' : ''} ${selectedBook?.id === book.id ? 'selected' : ''}" 
                         onclick="${book.available ? `selectBook('${book.id}')` : ''}" 
                         style="${!book.available ? 'opacity: 0.6; cursor: not-allowed;' : ''}">
                        <div class="book-info">
                            <img src="https://picsum.photos/seed/${book.isbn}/60/80.jpg" alt="${book.title}" class="book-cover">
                            <div class="book-details">
                                <h6>${book.title}</h6>
                                <p>by ${book.author}</p>
                                <p><strong>ISBN:</strong> ${book.isbn}</p>
                                <p><strong>Status:</strong> ${book.available ? 'Available' : 'Issued'}</p>
                            </div>
                        </div>
                    </div>
                `).join('');
            } else {
                results.innerHTML = '<p class="text-muted">No books found</p>';
            }
        }

        function selectBook(bookId) {
            selectedBook = books.find(book => book.id === bookId);
            if (selectedBook && selectedBook.available) {
                document.getElementById('bookSearch').value = selectedBook.title;
                document.getElementById('selectedBookTitle').textContent = `${selectedBook.title} by ${selectedBook.author}`;
                document.getElementById('selectedBookInfo').style.display = 'block';
                
                // Remove selected class from all cards
                document.querySelectorAll('.book-card').forEach(card => {
                    card.classList.remove('selected');
                });
                
                // Add selected class to chosen card
                event.currentTarget.classList.add('selected');
            }
        }

        function validateForm() {
            if (!selectedUser) {
                alert('Please select a user');
                return false;
            }

            if (!selectedBook) {
                alert('Please select a book');
                return false;
            }

            if (!selectedBook.available) {
                alert('Selected book is not available');
                return false;
            }

            // Validate dates
            const issueDate = document.getElementById('issueDate').value;
            const dueDate = document.getElementById('dueDate').value;

            if (!issueDate || !dueDate) {
                alert('Please select issue and due dates');
                return false;
            }

            if (new Date(dueDate) <= new Date(issueDate)) {
                alert('Due date must be after issue date');
                return false;
            }

            alert(`Book "${selectedBook.title}" issued to "${selectedUser.name}" successfully!`);
            
            // Here you would typically submit the form to the server
            resetForm();
            return false;
        }

        function resetForm() {
            document.getElementById('issueBookForm').reset();
            document.getElementById('bookResults').innerHTML = '';
            document.getElementById('selectedUserInfo').style.display = 'none';
            document.getElementById('selectedBookInfo').style.display = 'none';
            selectedUser = null;
            selectedBook = null;
            
            // Set default dates
            const today = new Date().toISOString().split('T')[0];
            const dueDate = new Date();
            dueDate.setDate(dueDate.getDate() + 14); // 2 weeks from now
            document.getElementById('issueDate').value = today;
            document.getElementById('dueDate').value = dueDate.toISOString().split('T')[0];
        }

        // Close suggestions when clicking outside
        document.addEventListener('click', function(event) {
            const userSearch = document.getElementById('userSearch');
            const userSuggestions = document.getElementById('userSuggestions');
            
            if (!userSearch.contains(event.target) && !userSuggestions.contains(event.target)) {
                userSuggestions.style.display = 'none';
            }
        });

        // Initialize form with default dates
        window.onload = function() {
            resetForm();
        };

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Books - BookYard Admin</title>
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
            background: #f0ebeb;
            border: 1px solid #080808;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgb(4 4 4 / 10%);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            color: #ffffff;
        }

        .content-card {
            background: #fefdfdff;
            padding: 25px;
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

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            padding: 10px 25px;
            border-radius: 8px;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            padding: 10px 25px;
            border-radius: 8px;
        }

        .issued-books-table {
            overflow-x: auto;
        }

        .issued-books-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .issued-books-table th {
            background-color: var(--primary-color);
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 500;
        }

        .issued-books-table td {
            padding: 12px;
            border-bottom: 1px solid #dee2e6;
        }

        .issued-books-table tr:hover {
            background-color: #f8f9fa;
        }

        .issued-books-table tr.selected {
            background-color: #e3f2fd;
        }

        .book-cover {
            width: 40px;
            height: 50px;
            border-radius: 3px;
            object-fit: cover;
        }

        .book-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-returned {
            background-color: #d4edda;
            color: #155724;
        }

        .status-overdue {
            background-color: #f8d7da;
            color: #721c24;
        }

        .status-due-soon {
            background-color: #fff3cd;
            color: #856404;
        }

        .fine-calculator {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
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
        .color{
            color: black;
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
            <a href="return-books.php" class="menu-item active">
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
            <h1 class="color">Return Books</h1>
            <div>
                <a href="issue-books.php" class="btn btn-secondary">
                    <i class="fas fa-hand-holding"></i> Issue Books
                </a>
            </div>
        </div>

        <div class="content-card">
            <form id="returnBookForm" onsubmit="return validateForm()">
                <div class="form-section">
                    <h5><i class="fas fa-search"></i> Search Issued Books</h5>
                    <div class="mb-3">
                        <label for="searchInput" class="form-label">Search by User, Book Title, or Issue ID</label>
                        <input type="text" class="form-control" id="searchInput" name="searchInput" placeholder="Enter search terms..." oninput="searchIssuedBooks()">
                    </div>
                </div>

                <div class="form-section">
                    <h5><i class="fas fa-list"></i> Issued Books</h5>
                    <div class="issued-books-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll" onchange="toggleSelectAll()"></th>
                                    <th>Issue ID</th>
                                    <th>Book</th>
                                    <th>User</th>
                                    <th>Issue Date</th>
                                    <th>Due Date</th>
                                    <th>Days Overdue</th>
                                    <th>Fine</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="issuedBooksTableBody">
                                <tr onclick="selectBook('ISS001')">
                                    <td><input type="checkbox" class="book-checkbox" data-id="ISS001"></td>
                                    <td>#ISS001</td>
                                    <td>
                                        <div class="book-info">
                                            <img src="https://picsum.photos/seed/gatsby/40/50.jpg" alt="Book" class="book-cover">
                                            <span>The Great Gatsby</span>
                                        </div>
                                    </td>
                                    <td>John Doe</td>
                                    <td>2024-01-10</td>
                                    <td>2024-01-24</td>
                                    <td><span class="status-badge status-overdue">5</span></td>
                                    <td>$2.50</td>
                                    <td><span class="status-badge status-overdue">Overdue</span></td>
                                </tr>
                                <tr onclick="selectBook('ISS002')">
                                    <td><input type="checkbox" class="book-checkbox" data-id="ISS002"></td>
                                    <td>#ISS002</td>
                                    <td>
                                        <div class="book-info">
                                            <img src="https://picsum.photos/seed/1984/40/50.jpg" alt="Book" class="book-cover">
                                            <span>1984</span>
                                        </div>
                                    </td>
                                    <td>Jane Smith</td>
                                    <td>2024-01-15</td>
                                    <td>2024-01-29</td>
                                    <td><span class="status-badge status-due-soon">2</span></td>
                                    <td>$1.00</td>
                                    <td><span class="status-badge status-due-soon">Due Soon</span></td>
                                </tr>
                                <tr onclick="selectBook('ISS003')">
                                    <td><input type="checkbox" class="book-checkbox" data-id="ISS003"></td>
                                    <td>#ISS003</td>
                                    <td>
                                        <div class="book-info">
                                            <img src="https://picsum.photos/seed/mockingbird/40/50.jpg" alt="Book" class="book-cover">
                                            <span>To Kill a Mockingbird</span>
                                        </div>
                                    </td>
                                    <td>Robert Johnson</td>
                                    <td>2024-01-20</td>
                                    <td>2024-02-03</td>
                                    <td><span class="status-badge status-returned">0</span></td>
                                    <td>$0.00</td>
                                    <td><span class="status-badge status-returned">Returned</span></td>
                                </tr>
                                <tr onclick="selectBook('ISS004')">
                                    <td><input type="checkbox" class="book-checkbox" data-id="ISS004"></td>
                                    <td>#ISS004</td>
                                    <td>
                                        <div class="book-info">
                                            <img src="https://picsum.photos/seed/sapiens/40/50.jpg" alt="Book" class="book-cover">
                                            <span>Sapiens</span>
                                        </div>
                                    </td>
                                    <td>Emily Davis</td>
                                    <td>2024-01-18</td>
                                    <td>2024-02-01</td>
                                    <td><span class="status-badge status-overdue">3</span></td>
                                    <td>$1.50</td>
                                    <td><span class="status-badge status-overdue">Overdue</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-section" id="returnDetails" style="display: none;">
                    <h5><i class="fas fa-undo"></i> Return Details</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="selectedBook" class="form-label">Selected Book</label>
                            <div class="alert alert-info" id="selectedBookInfo">
                                <i class="fas fa-book"></i> <span id="selectedBookTitle"></span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="selectedUser" class="form-label">Borrower</label>
                            <div class="alert alert-info" id="selectedUserInfo">
                                <i class="fas fa-user"></i> <span id="selectedUserName"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="returnDate" class="form-label">Return Date *</label>
                            <input type="date" class="form-control" id="returnDate" name="returnDate" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="condition" class="form-label">Book Condition</label>
                            <select class="form-select" id="condition" name="condition">
                                <option value="excellent">Excellent</option>
                                <option value="good">Good</option>
                                <option value="fair">Fair</option>
                                <option value="poor">Poor</option>
                                <option value="damaged">Damaged</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Return Notes</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Add any notes about the return..."></textarea>
                    </div>
                    <div class="fine-calculator">
                        <h6><i class="fas fa-calculator"></i> Fine Calculation</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="daysOverdue" class="form-label">Days Overdue</label>
                                <input type="number" class="form-control" id="daysOverdue" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="finePerDay" class="form-label">Fine per Day ($)</label>
                                <input type="number" class="form-control" id="finePerDay" step="0.01" min="0" value="0.50">
                            </div>
                            <div class="col-md-4">
                                <label for="totalFine" class="form-label">Total Fine ($)</label>
                                <input type="number" class="form-control" id="totalFine" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4" id="actionButtons" style="display: none;">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <div>
                                <button type="button" class="btn btn-warning" onclick="markAsLost()">
                                    <i class="fas fa-exclamation-triangle"></i> Mark as Lost
                                </button>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-secondary" onclick="resetForm()">
                                    <i class="fas fa-redo"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-undo"></i> Process Return
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
        // Sample data
        const issuedBooks = [
            { 
                id: 'ISS001', 
                bookTitle: 'The Great Gatsby', 
                userName: 'John Doe', 
                issueDate: '2024-01-10', 
                dueDate: '2024-01-24',
                daysOverdue: 5,
                fine: 2.50,
                status: 'overdue'
            },
            { 
                id: 'ISS002', 
                bookTitle: '1984', 
                userName: 'Jane Smith', 
                issueDate: '2024-01-15', 
                dueDate: '2024-01-29',
                daysOverdue: 2,
                fine: 1.00,
                status: 'due-soon'
            },
            { 
                id: 'ISS003', 
                bookTitle: 'To Kill a Mockingbird', 
                userName: 'Robert Johnson', 
                issueDate: '2024-01-20', 
                dueDate: '2024-02-03',
                daysOverdue: 0,
                fine: 0.00,
                status: 'returned'
            },
            { 
                id: 'ISS004', 
                bookTitle: 'Sapiens', 
                userName: 'Emily Davis', 
                issueDate: '2024-01-18', 
                dueDate: '2024-02-01',
                daysOverdue: 3,
                fine: 1.50,
                status: 'overdue'
            }
        ];

        let selectedBooks = [];

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function searchIssuedBooks() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const rows = document.querySelectorAll('#issuedBooksTableBody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        }

        function selectBook(issueId) {
            const checkbox = document.querySelector(`[data-id="${issueId}"]`);
            if (checkbox) {
                checkbox.checked = !checkbox.checked;
                updateSelectedBooks();
            }
        }

        function toggleSelectAll() {
            const selectAll = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.book-checkbox');
            
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
            
            updateSelectedBooks();
        }

        function updateSelectedBooks() {
            const checkboxes = document.querySelectorAll('.book-checkbox:checked');
            selectedBooks = Array.from(checkboxes).map(checkbox => checkbox.dataset.id);
            
            const returnDetails = document.getElementById('returnDetails');
            const actionButtons = document.getElementById('actionButtons');
            
            if (selectedBooks.length > 0) {
                returnDetails.style.display = 'block';
                actionButtons.style.display = 'block';
                
                // Show first selected book details
                const firstBook = issuedBooks.find(book => book.id === selectedBooks[0]);
                if (firstBook) {
                    document.getElementById('selectedBookTitle').textContent = firstBook.bookTitle;
                    document.getElementById('selectedUserName').textContent = firstBook.userName;
                    document.getElementById('daysOverdue').value = firstBook.daysOverdue;
                    document.getElementById('totalFine').value = firstBook.fine;
                }
            } else {
                returnDetails.style.display = 'none';
                actionButtons.style.display = 'none';
            }
        }

        function calculateFine() {
            const daysOverdue = parseInt(document.getElementById('daysOverdue').value) || 0;
            const finePerDay = parseFloat(document.getElementById('finePerDay').value) || 0.50;
            const totalFine = daysOverdue * finePerDay;
            document.getElementById('totalFine').value = totalFine.toFixed(2);
        }

        function validateForm() {
            if (selectedBooks.length === 0) {
                alert('Please select at least one book to return');
                return false;
            }

            const returnDate = document.getElementById('returnDate').value;
            if (!returnDate) {
                alert('Please select a return date');
                return false;
            }

            const condition = document.getElementById('condition').value;
            if (condition === 'damaged') {
                if (!confirm('This book is marked as damaged. Additional charges may apply. Continue?')) {
                    return false;
                }
            }

            alert(`Successfully processed return for ${selectedBooks.length} book(s)!`);
            
            // Here you would typically submit the form to the server
            resetForm();
            return false;
        }

        function markAsLost() {
            if (selectedBooks.length === 0) {
                alert('Please select at least one book to mark as lost');
                return;
            }

            if (confirm(`Mark ${selectedBooks.length} book(s) as lost? This will record the books as lost and may require replacement fees.`)) {
                alert(`Successfully marked ${selectedBooks.length} book(s) as lost!`);
                resetForm();
            }
        }

        function resetForm() {
            document.getElementById('returnBookForm').reset();
            document.getElementById('returnDetails').style.display = 'none';
            document.getElementById('actionButtons').style.display = 'none';
            document.getElementById('selectAll').checked = false;
            
            // Uncheck all checkboxes
            document.querySelectorAll('.book-checkbox').forEach(checkbox => {
                checkbox.checked = false;
            });
            
            // Remove selected class from all rows
            document.querySelectorAll('#issuedBooksTableBody tr').forEach(row => {
                row.classList.remove('selected');
            });
            
            selectedBooks = [];
            
            // Set default return date to today
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('returnDate').value = today;
        }

        // Update fine calculation when fine per day changes
        document.getElementById('finePerDay').addEventListener('input', calculateFine);

        // Initialize form
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
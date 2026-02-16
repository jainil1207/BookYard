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

// Mock data for book history (in real app, this would come from database)
$book_history = [
    [
        'id' => 'B001',
        'title' => '1984',
        'author' => 'George Orwell',
        'category' => 'Classic Literature',
        'issue_date' => '2024-01-10',
        'return_date' => '2024-01-28',
        'due_date' => '2024-01-25',
        'status' => 'returned',
        'fine' => 0,
        'rating' => 5,
        'cover_color' => '#e8f5e8'
    ],
    [
        'id' => 'B002',
        'title' => 'The Great Gatsby',
        'author' => 'F. Scott Fitzgerald',
        'category' => 'Classic Literature',
        'issue_date' => '2023-12-15',
        'return_date' => '2024-01-05',
        'due_date' => '2023-12-29',
        'status' => 'returned',
        'fine' => 50,
        'rating' => 4,
        'cover_color' => '#fff3e0'
    ],
    [
        'id' => 'B003',
        'title' => 'To Kill a Mockingbird',
        'author' => 'Harper Lee',
        'category' => 'Classic Literature',
        'issue_date' => '2023-11-20',
        'return_date' => '2023-12-10',
        'due_date' => '2023-12-05',
        'status' => 'returned',
        'fine' => 75,
        'rating' => 5,
        'cover_color' => '#f3e5f5'
    ],
    [
        'id' => 'B004',
        'title' => 'Pride and Prejudice',
        'author' => 'Jane Austen',
        'category' => 'Classic Literature',
        'issue_date' => '2023-10-15',
        'return_date' => '2023-11-01',
        'due_date' => '2023-10-29',
        'status' => 'returned',
        'fine' => 25,
        'rating' => 4,
        'cover_color' => '#e3f2fd'
    ],
    [
        'id' => 'B005',
        'title' => 'The Catcher in the Rye',
        'author' => 'J.D. Salinger',
        'category' => 'Classic Literature',
        'issue_date' => '2023-09-10',
        'return_date' => '2023-09-28',
        'due_date' => '2023-09-24',
        'status' => 'returned',
        'fine' => 30,
        'rating' => 3,
        'cover_color' => '#ffebee'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book History - BookYard User</title>
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

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #1a1a1a;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
            color: #ffffff;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #cccccc;
            font-size: 0.9rem;
        }

        .history-card {
            background: #1a1a1a;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
            color: #ffffff;
        }

        .history-card:hover {
            transform: translateY(-3px);
        }

        .history-header {
            padding: 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }

        .history-body {
            padding: 20px;
        }

        .book-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #333333;
            transition: background-color 0.3s ease;
        }

        .book-item:hover {
            background-color: #1a1a1a;
        }

        .book-item:last-child {
            border-bottom: none;
        }

        .book-cover {
            width: 60px;
            height: 80px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .book-info {
            flex-grow: 1;
        }

        .book-title {
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 5px;
        }

        .book-author {
            color: #cccccc;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .book-dates {
            display: flex;
            gap: 20px;
            font-size: 0.85rem;
            color: #999999;
        }

        .date-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .book-meta {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
        }

        .rating {
            color: #ffc107;
        }

        .fine-amount {
            color: #dc3545;
            font-weight: bold;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .status-returned {
            background: #d4edda;
            color: #155724;
        }

        .filter-section {
            background: #1a1a1a;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
            margin-bottom: 30px;
            color: #ffffff;
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

            .book-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .book-meta {
                align-items: flex-start;
                margin-top: 10px;
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
            <a href="book-history.php" class="menu-item active">
                <i class="fas fa-history"></i> Book History
            </a>
            <a href="reserved-books.php" class="menu-item">
                <i class="fas fa-bookmark"></i> Reserved Books
            </a>
            <a href="profile.php" class="menu-item">
                <i class="fas fa-user"></i> Profile
            </a>
            <a href="settings.php" class="menu-item">
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
            <h1>Book History</h1>
            <div>
                <span>Welcome, <?php echo htmlspecialchars($user_name); ?>!</span>
                <i class="fas fa-user-circle ms-2" style="font-size: 1.5rem;"></i>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value text-primary">12</div>
                <div class="stat-label">Total Books Read</div>
            </div>
            <div class="stat-card">
                <div class="stat-value text-success">8</div>
                <div class="stat-label">On-Time Returns</div>
            </div>
            <div class="stat-card">
                <div class="stat-value text-warning">4</div>
                <div class="stat-label">Late Returns</div>
            </div>
            <div class="stat-card">
                <div class="stat-value text-danger">₹180</div>
                <div class="stat-label">Total Fines Paid</div>
            </div>
        </div>

        <div class="filter-section">
            <div class="row">
                <div class="col-md-4">
                    <label for="dateFilter" class="form-label">Filter by Date</label>
                    <select class="form-select" id="dateFilter">
                        <option value="all">All Time</option>
                        <option value="last30">Last 30 Days</option>
                        <option value="last90">Last 3 Months</option>
                        <option value="last180">Last 6 Months</option>
                        <option value="last365">Last Year</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="categoryFilter" class="form-label">Filter by Category</label>
                    <select class="form-select" id="categoryFilter">
                        <option value="all">All Categories</option>
                        <option value="civil">Civil Engineering</option>
                        <option value="computer">Computer Engineering</option>
                        <option value="ai">AI & ML</option>
                        <option value="classic">Classic Literature</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="statusFilter" class="form-label">Filter by Status</label>
                    <select class="form-select" id="statusFilter">
                        <option value="all">All Status</option>
                        <option value="returned">Returned</option>
                        <option value="overdue">Overdue</option>
                        <option value="lost">Lost</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="history-card">
            <div class="history-header">
                <h5><i class="fas fa-history"></i> Your Reading History</h5>
                <p class="mb-0">Track your reading journey and library activity</p>
            </div>
            <div class="history-body">
                <?php foreach ($book_history as $book): ?>
                    <div class="book-item">
                        <div class="book-cover" style="background: <?php echo $book['cover_color']; ?>;">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="book-info">
                            <div class="book-title"><?php echo htmlspecialchars($book['title']); ?></div>
                            <div class="book-author">by <?php echo htmlspecialchars($book['author']); ?></div>
                            <div class="book-dates">
                                <div class="date-item">
                                    <i class="fas fa-calendar-plus"></i>
                                    <span>Issued: <?php echo $book['issue_date']; ?></span>
                                </div>
                                <div class="date-item">
                                    <i class="fas fa-calendar-check"></i>
                                    <span>Returned: <?php echo $book['return_date']; ?></span>
                                </div>
                                <div class="date-item">
                                    <i class="fas fa-calendar-times"></i>
                                    <span>Due: <?php echo $book['due_date']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="book-meta">
                            <div class="rating">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <i class="fas fa-star <?php echo $i <= $book['rating'] ? '' : 'text-muted'; ?>"></i>
                                <?php endfor; ?>
                            </div>
                            <?php if ($book['fine'] > 0): ?>
                                <div class="fine-amount">
                                    <i class="fas fa-exclamation-triangle"></i> Fine: ₹<?php echo $book['fine']; ?>
                                </div>
                            <?php endif; ?>
                            <div class="status-badge status-returned">
                                <i class="fas fa-check-circle"></i> Returned
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        // Filter functionality
        document.getElementById('dateFilter').addEventListener('change', filterHistory);
        document.getElementById('categoryFilter').addEventListener('change', filterHistory);
        document.getElementById('statusFilter').addEventListener('change', filterHistory);

        function filterHistory() {
            const dateFilter = document.getElementById('dateFilter').value;
            const categoryFilter = document.getElementById('categoryFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;
            
            // In a real app, this would filter the data and update the display
            console.log('Filtering by:', { dateFilter, categoryFilter, statusFilter });
            
            // For demo purposes, just show an alert
            if (dateFilter !== 'all' || categoryFilter !== 'all' || statusFilter !== 'all') {
                alert('Filter applied: ' + 
                    (dateFilter !== 'all' ? dateFilter + ' ' : '') +
                    (categoryFilter !== 'all' ? categoryFilter + ' ' : '') +
                    (statusFilter !== 'all' ? statusFilter : ''));
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

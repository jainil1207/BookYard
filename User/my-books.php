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

// Mock data for borrowed books (in real app, this would come from database)
$borrowed_books = [
    [
        'id' => 'B001',
        'title' => 'Structural Analysis',
        'author' => 'R.C. Hibbeler',
        'category' => 'Civil Engineering',
        'issue_date' => '2024-02-01',
        'due_date' => '2024-02-20',
        'days_left' => 3,
        'status' => 'due_soon',
        'cover_color' => '#e3f2fd'
    ],
    [
        'id' => 'B002',
        'title' => 'Machine Learning Basics',
        'author' => 'Andrew Ng',
        'category' => 'AI & ML',
        'issue_date' => '2024-02-05',
        'due_date' => '2024-02-25',
        'days_left' => 8,
        'status' => 'on_time',
        'cover_color' => '#f3e5f5'
    ],
    [
        'id' => 'B003',
        'title' => 'Digital Marketing',
        'author' => 'Dave Chaffey',
        'category' => 'Marketing',
        'issue_date' => '2024-01-20',
        'due_date' => '2024-02-15',
        'days_left' => -2,
        'status' => 'overdue',
        'cover_color' => '#ffebee'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Books - BookYard User</title>
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
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
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

        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .book-card {
            background: #1a1a1a;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            color: #ffffff;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .book-cover {
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
            position: relative;
        }

        .book-cover .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .book-card:hover .book-cover .overlay {
            opacity: 1;
        }

        .book-details {
            padding: 20px;
        }

        .book-title {
            font-size: 1.1rem;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .book-author {
            color: #cccccc;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .book-category {
            display: inline-block;
            background: #333333;
            color: #ffffff;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            margin-bottom: 12px;
        }

        .book-dates {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 0.85rem;
        }

        .date-item {
            text-align: center;
        }

        .date-label {
            color: #999999;
            display: block;
            margin-bottom: 2px;
        }

        .date-value {
            color: #ffffff;
            font-weight: 500;
        }

        .book-status {
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }

        .status-on-time {
            background: #d4edda;
            color: #155724;
        }

        .status-due-soon {
            background: #fff3cd;
            color: #856404;
        }

        .status-overdue {
            background: #f8d7da;
            color: #721c24;
        }

        .book-actions {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            flex: 1;
            padding: 8px 15px;
            border: none;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-renew {
            background: var(--primary-color);
            color: white;
        }

        .btn-renew:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .btn-return {
            background: #6c757d;
            color: white;
        }

        .btn-return:hover {
            background: #5a6268;
            transform: translateY(-2px);
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

            .book-grid {
                grid-template-columns: 1fr;
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
            <a href="my-books.php" class="menu-item active">
                <i class="fas fa-book"></i> My Books
            </a>
            <a href="browse-books.php" class="menu-item">
                <i class="fas fa-search"></i> Browse Books
            </a>
            <a href="book-history.php" class="menu-item">
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
            <h1>My Books</h1>
            <div>
                <span>Welcome, <?php echo htmlspecialchars($user_name); ?>!</span>
                <i class="fas fa-user-circle ms-2" style="font-size: 1.5rem;"></i>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value text-success">3</div>
                <div class="stat-label">Currently Borrowed</div>
            </div>
            <div class="stat-card">
                <div class="stat-value text-warning">1</div>
                <div class="stat-label">Due Soon</div>
            </div>
            <div class="stat-card">
                <div class="stat-value text-danger">1</div>
                <div class="stat-label">Overdue</div>
            </div>
            <div class="stat-card">
                <div class="stat-value text-info">2</div>
                <div class="stat-label">Renewals Available</div>
            </div>
        </div>

        <div class="book-grid">
            <?php foreach ($borrowed_books as $book): ?>
                <div class="book-card">
                    <div class="book-cover" style="background: <?php echo $book['cover_color']; ?>;">
                        <i class="fas fa-book"></i>
                        <div class="overlay">
                            <button class="btn btn-light btn-sm" onclick="viewBookDetails('<?php echo $book['id']; ?>')">
                                <i class="fas fa-eye"></i> View Details
                            </button>
                        </div>
                    </div>
                    <div class="book-details">
                        <div class="book-title"><?php echo htmlspecialchars($book['title']); ?></div>
                        <div class="book-author">by <?php echo htmlspecialchars($book['author']); ?></div>
                        <div class="book-category"><?php echo htmlspecialchars($book['category']); ?></div>
                        
                        <div class="book-dates">
                            <div class="date-item">
                                <span class="date-label">Issued</span>
                                <span class="date-value"><?php echo $book['issue_date']; ?></span>
                            </div>
                            <div class="date-item">
                                <span class="date-label">Due</span>
                                <span class="date-value"><?php echo $book['due_date']; ?></span>
                            </div>
                        </div>
                        
                        <?php
                        $status_class = '';
                        $status_text = '';
                        if ($book['status'] === 'on_time') {
                            $status_class = 'status-on-time';
                            $status_text = $book['days_left'] . ' days left';
                        } elseif ($book['status'] === 'due_soon') {
                            $status_class = 'status-due-soon';
                            $status_text = 'Due in ' . $book['days_left'] . ' days';
                        } else {
                            $status_class = 'status-overdue';
                            $status_text = abs($book['days_left']) . ' days overdue';
                        }
                        ?>
                        <div class="book-status <?php echo $status_class; ?>">
                            <?php echo $status_text; ?>
                        </div>
                        
                        <div class="book-actions">
                            <?php if ($book['status'] !== 'overdue'): ?>
                                <button class="btn-action btn-renew" onclick="renewBook('<?php echo $book['id']; ?>')">
                                    <i class="fas fa-redo"></i> Renew
                                </button>
                            <?php endif; ?>
                            <button class="btn-action btn-return" onclick="returnBook('<?php echo $book['id']; ?>')">
                                <i class="fas fa-undo"></i> Return
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function viewBookDetails(bookId) {
            // In a real app, this would show book details modal or navigate to book page
            alert('Viewing details for book: ' + bookId);
        }

        function renewBook(bookId) {
            if (confirm('Are you sure you want to renew this book?')) {
                // In a real app, this would make an API call to renew the book
                alert('Book ' + bookId + ' renewed successfully!');
                location.reload();
            }
        }

        function returnBook(bookId) {
            if (confirm('Are you sure you want to return this book?')) {
                // In a real app, this would make an API call to return the book
                alert('Book ' + bookId + ' returned successfully!');
                location.reload();
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

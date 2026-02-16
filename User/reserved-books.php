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

// Mock data for reserved books (in real app, this would come from database)
$reserved_books = [
    [
        'id' => 'B001',
        'title' => 'Deep Learning',
        'author' => 'Ian Goodfellow',
        'category' => 'AI & ML',
        'reserve_date' => '2024-01-25',
        'expected_available' => '2024-02-10',
        'queue_position' => 1,
        'cover_color' => '#f3e5f5'
    ],
    [
        'id' => 'B002',
        'title' => 'Advanced Algorithms',
        'author' => 'Robert Sedgewick',
        'category' => 'Computer Engineering',
        'reserve_date' => '2024-02-01',
        'expected_available' => '2024-02-20',
        'queue_position' => 3,
        'cover_color' => '#e3f2fd'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserved Books - BookYard User</title>
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

        .reserved-card {
            background: #1a1a1a;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
            color: #ffffff;
        }

        .reserved-card:hover {
            transform: translateY(-3px);
        }

        .reserved-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px;
        }

        .reserved-body {
            padding: 20px;
        }

        .book-item {
            display: flex;
            align-items: center;
            padding: 20px;
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
            width: 80px;
            height: 100px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .book-info {
            flex-grow: 1;
        }

        .book-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .book-author {
            color: #cccccc;
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .book-category {
            display: inline-block;
            background: #333333;
            color: #ffffff;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.85rem;
            margin-bottom: 12px;
        }

        .reservation-details {
            display: flex;
            gap: 30px;
            font-size: 0.9rem;
            color: #cccccc;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .detail-item i {
            color: var(--primary-color);
        }

        .book-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 10px;
        }

        .queue-position {
            background: var(--primary-color);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .btn-action {
            padding: 8px 20px;
            border: none;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-cancel {
            background: #dc3545;
            color: white;
        }

        .btn-cancel:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        .btn-extend {
            background: #ffc107;
            color: #212529;
        }

        .btn-extend:hover {
            background: #e0a800;
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

            .book-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .book-actions {
                align-items: flex-start;
                margin-top: 15px;
            }

            .reservation-details {
                flex-direction: column;
                gap: 10px;
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
            <a href="book-history.php" class="menu-item">
                <i class="fas fa-history"></i> Book History
            </a>
            <a href="reserved-books.php" class="menu-item active">
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
            <h1>Reserved Books</h1>
            <div>
                <span>Welcome, <?php echo htmlspecialchars($user_name); ?>!</span>
                <i class="fas fa-user-circle ms-2" style="font-size: 1.5rem;"></i>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value text-warning">2</div>
                <div class="stat-label">Active Reservations</div>
            </div>
            <div class="stat-card">
                <div class="stat-value text-info">1</div>
                <div class="stat-label">Available Soon</div>
            </div>
            <div class="stat-card">
                <div class="stat-value text-primary">5</div>
                <div class="stat-label">Total Reservations</div>
            </div>
            <div class="stat-card">
                <div class="stat-value text-success">3</div>
                <div class="stat-label">Completed Reservations</div>
            </div>
        </div>

        <div class="reserved-card">
            <div class="reserved-header">
                <h5><i class="fas fa-bookmark"></i> Your Reserved Books</h5>
                <p class="mb-0">Books you have reserved and are waiting for</p>
            </div>
            <div class="reserved-body">
                <?php foreach ($reserved_books as $book): ?>
                    <div class="book-item">
                        <div class="book-cover" style="background: <?php echo $book['cover_color']; ?>;">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="book-info">
                            <div class="book-title"><?php echo htmlspecialchars($book['title']); ?></div>
                            <div class="book-author">by <?php echo htmlspecialchars($book['author']); ?></div>
                            <div class="book-category"><?php echo htmlspecialchars($book['category']); ?></div>
                            
                            <div class="reservation-details">
                                <div class="detail-item">
                                    <i class="fas fa-calendar-plus"></i>
                                    <span>Reserved: <?php echo $book['reserve_date']; ?></span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-calendar-check"></i>
                                    <span>Expected: <?php echo $book['expected_available']; ?></span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-list-ol"></i>
                                    <span>Queue: Position <?php echo $book['queue_position']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="book-actions">
                            <div class="queue-position">
                                <i class="fas fa-users"></i> Position <?php echo $book['queue_position']; ?>
                            </div>
                            <button class="btn-action btn-extend" onclick="extendReservation('<?php echo $book['id']; ?>')">
                                <i class="fas fa-clock"></i> Extend Reservation
                            </button>
                            <button class="btn-action btn-cancel" onclick="cancelReservation('<?php echo $book['id']; ?>')">
                                <i class="fas fa-times"></i> Cancel Reservation
                            </button>
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

        function extendReservation(bookId) {
            if (confirm('Are you sure you want to extend this reservation?')) {
                // In a real app, this would make an API call
                alert('Reservation for book ' + bookId + ' extended successfully!');
                location.reload();
            }
        }

        function cancelReservation(bookId) {
            if (confirm('Are you sure you want to cancel this reservation?')) {
                // In a real app, this would make an API call
                alert('Reservation for book ' + bookId + ' cancelled successfully!');
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

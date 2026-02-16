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

// Mock data for available books (in real app, this would come from database)
$available_books = [
    [
        'id' => 'B001',
        'title' => 'Structural Analysis',
        'author' => 'R.C. Hibbeler',
        'category' => 'Civil Engineering',
        'isbn' => '978-0133942842',
        'available' => true,
        'rating' => 4.5,
        'cover_color' => '#e3f2fd'
    ],
    [
        'id' => 'B002',
        'title' => 'Machine Learning Basics',
        'author' => 'Andrew Ng',
        'category' => 'AI & ML',
        'isbn' => '978-1108423944',
        'available' => true,
        'rating' => 4.8,
        'cover_color' => '#f3e5f5'
    ],
    [
        'id' => 'B003',
        'title' => 'Digital Marketing',
        'author' => 'Dave Chaffey',
        'category' => 'Marketing',
        'isbn' => '978-1292318741',
        'available' => false,
        'rating' => 4.2,
        'cover_color' => '#ffebee'
    ],
    [
        'id' => 'B004',
        'title' => 'Web Development',
        'author' => 'Jon Duckett',
        'category' => 'Computer Engineering',
        'isbn' => '978-1119577191',
        'available' => true,
        'rating' => 4.6,
        'cover_color' => '#e8f5e8'
    ],
    [
        'id' => 'B005',
        'title' => 'Data Science',
        'author' => 'Joel Grus',
        'category' => 'Data Science',
        'isbn' => '978-1491901427',
        'available' => true,
        'rating' => 4.4,
        'cover_color' => '#fff3e0'
    ],
    [
        'id' => 'B006',
        'title' => 'Deep Learning',
        'author' => 'Ian Goodfellow',
        'category' => 'AI & ML',
        'isbn' => '978-0262035613',
        'available' => false,
        'rating' => 4.7,
        'cover_color' => '#f3e5f5'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Books - BookYard User</title>
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

        .search-section {
            background: #1a1a1a;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
            margin-bottom: 30px;
            color: #ffffff;
        }

        .search-input {
            border: 2px solid #333333;
            border-radius: 25px;
            padding: 12px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #000000;
            color: #ffffff;
        }

        .search-input:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
        }

        .filter-section {
            background: #1a1a1a;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
            margin-bottom: 30px;
            color: #ffffff;
        }

        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .book-card {
            background: #1a1a1a;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            color: #ffffff;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .book-cover {
            height: 200px;
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
            flex-grow: 1;
            display: flex;
            flex-direction: column;
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

        .book-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 0.85rem;
        }

        .rating {
            color: #ffc107;
        }

        .availability {
            font-weight: bold;
        }

        .available {
            color: #28a745;
        }

        .unavailable {
            color: #dc3545;
        }

        .book-actions {
            margin-top: auto;
        }

        .btn-action {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-borrow {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }

        .btn-borrow:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-reserve {
            background: #ffc107;
            color: #212529;
        }

        .btn-reserve:hover {
            background: #e0a800;
            transform: translateY(-2px);
        }

        .btn-disabled {
            background: #6c757d;
            color: white;
            cursor: not-allowed;
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
            <a href="my-books.php" class="menu-item">
                <i class="fas fa-book"></i> My Books
            </a>
            <a href="browse-books.php" class="menu-item active">
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
            <h1>Browse Books</h1>
            <div>
                <span>Welcome, <?php echo htmlspecialchars($user_name); ?>!</span>
                <i class="fas fa-user-circle ms-2" style="font-size: 1.5rem;"></i>
            </div>
        </div>

        <div class="search-section">
            <div class="row">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control search-input" placeholder="Search books by title, author, or ISBN..." id="searchInput">
                        <button class="btn btn-primary" style="border-radius: 0 25px 25px 0;" onclick="searchBooks()">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </div>
                <div class="col-md-4">
                    <select class="form-select search-input" id="sortSelect">
                        <option value="title">Sort by Title</option>
                        <option value="author">Sort by Author</option>
                        <option value="rating">Sort by Rating</option>
                        <option value="newest">Newest First</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="filter-section">
            <div class="row">
                <div class="col-md-3">
                    <label class="form-label">Category</label>
                    <select class="form-select" id="categoryFilter">
                        <option value="all">All Categories</option>
                        <option value="civil">Civil Engineering</option>
                        <option value="computer">Computer Engineering</option>
                        <option value="ai">AI & ML</option>
                        <option value="marketing">Marketing</option>
                        <option value="data">Data Science</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Availability</label>
                    <select class="form-select" id="availabilityFilter">
                        <option value="all">All Books</option>
                        <option value="available">Available</option>
                        <option value="unavailable">Borrowed</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Rating</label>
                    <select class="form-select" id="ratingFilter">
                        <option value="all">All Ratings</option>
                        <option value="4">4+ Stars</option>
                        <option value="3">3+ Stars</option>
                        <option value="2">2+ Stars</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">&nbsp;</label>
                    <button class="btn btn-outline-primary w-100" onclick="applyFilters()">
                        <i class="fas fa-filter"></i> Apply Filters
                    </button>
                </div>
            </div>
        </div>

        <div class="book-grid">
            <?php foreach ($available_books as $book): ?>
                <div class="book-card">
                    <div class="book-cover" style="background: <?php echo $book['cover_color']; ?>;">
                        <i class="fas fa-book"></i>
                        <div class="overlay">
                            <button class="btn btn-light btn-sm" onclick="viewBookDetails('<?php echo $book['id']; ?>')">
                                <i class="fas fa-eye"></i> Quick View
                            </button>
                        </div>
                    </div>
                    <div class="book-details">
                        <div class="book-title"><?php echo htmlspecialchars($book['title']); ?></div>
                        <div class="book-author">by <?php echo htmlspecialchars($book['author']); ?></div>
                        <div class="book-category"><?php echo htmlspecialchars($book['category']); ?></div>
                        
                        <div class="book-meta">
                            <div class="rating">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <i class="fas fa-star <?php echo $i <= $book['rating'] ? '' : 'text-muted'; ?>"></i>
                                <?php endfor; ?>
                                <span class="text-muted ms-1">(<?php echo $book['rating']; ?>)</span>
                            </div>
                            <div class="availability <?php echo $book['available'] ? 'available' : 'unavailable'; ?>">
                                <?php echo $book['available'] ? 'Available' : 'Borrowed'; ?>
                            </div>
                        </div>
                        
                        <div class="book-actions">
                            <?php if ($book['available']): ?>
                                <button class="btn-action btn-borrow" onclick="borrowBook('<?php echo $book['id']; ?>')">
                                    <i class="fas fa-hand-holding"></i> Borrow Book
                                </button>
                            <?php else: ?>
                                <button class="btn-action btn-reserve" onclick="reserveBook('<?php echo $book['id']; ?>')">
                                    <i class="fas fa-bookmark"></i> Reserve Book
                                </button>
                            <?php endif; ?>
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
            // In a real app, this would show book details modal
            alert('Viewing details for book: ' + bookId);
        }

        function borrowBook(bookId) {
            if (confirm('Are you sure you want to borrow this book?')) {
                // In a real app, this would make an API call
                alert('Book ' + bookId + ' borrowed successfully!');
                location.reload();
            }
        }

        function reserveBook(bookId) {
            if (confirm('Are you sure you want to reserve this book?')) {
                // In a real app, this would make an API call
                alert('Book ' + bookId + ' reserved successfully!');
                location.reload();
            }
        }

        function searchBooks() {
            const searchTerm = document.getElementById('searchInput').value;
            console.log('Searching for:', searchTerm);
            // In a real app, this would filter the books
        }

        function applyFilters() {
            const category = document.getElementById('categoryFilter').value;
            const availability = document.getElementById('availabilityFilter').value;
            const rating = document.getElementById('ratingFilter').value;
            
            console.log('Applying filters:', { category, availability, rating });
            // In a real app, this would filter the books
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

<?php
// User Sidebar Component
// Note: Session check should be performed in the including file before any output
?>

<style>
:root {
    --user-sidebar-width: 250px;
    --user-primary-color: #000000;
    --user-secondary-color: #333333;
    --user-accent-color: #ffffff;
    --user-text-light: #ffffff;
    --user-bg-light: #000000;
    --user-text-dark: #ffffff;
}

.user-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: var(--user-sidebar-width);
    height: 100vh;
    background: linear-gradient(135deg, var(--user-primary-color), var(--user-secondary-color));
    color: var(--user-text-light);
    z-index: 1000;
    transition: transform 0.3s ease;
    overflow-y: auto;
    border: 1px solid #ffffff;
}

.user-sidebar-header {
    padding: 20px;
    text-align: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}

.user-sidebar-header h3 {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 5px;
}

.user-sidebar-header p {
    font-size: 0.9rem;
    opacity: 0.8;
}

.user-profile-section {
    padding: 20px;
    text-align: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}

.user-avatar-small {
    width: 60px;
    height: 60px;
    background: linear-gradient(45deg, var(--user-accent-color), #cccccc);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--user-text-dark);
    font-size: 1.5rem;
    margin: 0 auto 10px;
    border: 2px solid rgba(255, 255, 255, 0.5);
}

.user-name {
    font-weight: 600;
    margin-bottom: 5px;
}

.user-email {
    font-size: 0.8rem;
    opacity: 0.7;
}

.user-sidebar-menu {
    padding: 20px 0;
}

.user-menu-item {
    display: block;
    padding: 12px 20px;
    color: var(--user-text-light);
    text-decoration: none;
    transition: all 0.3s ease;
    border-left: 3px solid transparent;
    font-size: 0.95rem;
}

.user-menu-item:hover {
    background-color: rgba(255, 255, 255, 0.2);
    border-left-color: var(--user-accent-color);
    padding-left: 25px;
}

.user-menu-item.active {
    background-color: rgba(255, 255, 255, 0.25);
    border-left-color: var(--user-accent-color);
}

.user-menu-item i {
    width: 20px;
    margin-right: 10px;
}

.user-menu-section {
    padding: 10px 0;
}

.user-menu-section-title {
    padding: 5px 20px;
    font-size: 0.75rem;
    text-transform: uppercase;
    opacity: 0.6;
    letter-spacing: 1px;
    margin-bottom: 5px;
}

.user-main-content {
    margin-left: var(--user-sidebar-width);
    padding: 20px;
    min-height: 100vh;
    background-color: var(--user-bg-light);
    color: var(--user-text-light);
}

.user-mobile-toggle {
    display: none;
    position: fixed;
    top: 20px;
    left: 20px;
    z-index: 1001;
    background: var(--user-primary-color);
    color: var(--user-text-light);
    border: 1px solid #ffffff;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 0 2px 10px rgba(255, 255, 255, 0.3);
}

@media (max-width: 768px) {
    .user-sidebar {
        transform: translateX(-100%);
    }

    .user-sidebar.active {
        transform: translateX(0);
    }

    .user-main-content {
        margin-left: 0;
    }

    .user-mobile-toggle {
        display: block;
    }
}
</style>

<button class="user-mobile-toggle" onclick="toggleUserSidebar()">
    <i class="fas fa-bars"></i>
</button>

<div class="user-sidebar" id="userSidebar">
    <div class="user-sidebar-header">
        <h3><i class="fas fa-book"></i> BookYard</h3>
        <p>User Panel</p>
    </div>
    
    <div class="user-profile-section">
        <div class="user-avatar-small">
            <i class="fas fa-user"></i>
        </div>
        <div class="user-name"><?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'User'; ?></div>
        <div class="user-email"><?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : 'user@example.com'; ?></div>
    </div>
    
    <nav class="user-sidebar-menu">
        <div class="user-menu-section">
            <div class="user-menu-section-title">Main</div>
            <a href="dashboard.php" class="user-menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="../Shop.php" class="user-menu-item">
                <i class="fas fa-search"></i> Browse Books
            </a>
        </div>
        
        <div class="user-menu-section">
            <div class="user-menu-section-title">My Library</div>
            <a href="mybooks.php" class="user-menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'mybooks.php' ? 'active' : ''; ?>">
                <i class="fas fa-bookmark"></i> My Books
            </a>
            <a href="borrowed-books.php" class="user-menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'borrowed-books.php' ? 'active' : ''; ?>">
                <i class="fas fa-hand-holding"></i> Borrowed Books
            </a>
            <a href="downloads.php" class="user-menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'downloads.php' ? 'active' : ''; ?>">
                <i class="fas fa-download"></i> Downloads
            </a>
            <a href="book-history.php" class="user-menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'book-history.php' ? 'active' : ''; ?>">
                <i class="fas fa-history"></i> Reading History
            </a>
        </div>
        
        <div class="user-menu-section">
            <div class="user-menu-section-title">Account</div>
            <a href="profile.php" class="user-menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>">
                <i class="fas fa-user"></i> Profile
            </a>
            <a href="settings.php" class="user-menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : ''; ?>">
                <i class="fas fa-cog"></i> Settings
            </a>
            <a href="notifications.php" class="user-menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'notifications.php' ? 'active' : ''; ?>">
                <i class="fas fa-bell"></i> Notifications
            </a>
        </div>
        
        <div class="user-menu-section">
            <div class="user-menu-section-title">Actions</div>
            <a href="../Home.php" class="user-menu-item">
                <i class="fas fa-home"></i> Back to Main Site
            </a>
            <a href="../Auth/logout.php" class="user-menu-item">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </nav>
</div>

<script>
function toggleUserSidebar() {
    const sidebar = document.getElementById('userSidebar');
    sidebar.classList.toggle('active');
}

// Close sidebar when clicking outside on mobile
document.addEventListener('click', function(event) {
    const sidebar = document.getElementById('userSidebar');
    const toggle = document.querySelector('.user-mobile-toggle');
    
    if (window.innerWidth <= 768 && 
        !sidebar.contains(event.target) && 
        !toggle.contains(event.target) &&
        sidebar.classList.contains('active')) {
        sidebar.classList.remove('active');
    }
});

// Handle window resize
window.addEventListener('resize', function() {
    const sidebar = document.getElementById('userSidebar');
    if (window.innerWidth > 768) {
        sidebar.classList.remove('active');
    }
});
</script>

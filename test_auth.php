<?php
session_start();

// Test login functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Demo user credentials
    if ($email === 'user@bookyard.com' && $password === 'user123') {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_name'] = 'John Doe';
        $_SESSION['user_email'] = 'user@bookyard.com';
        $_SESSION['user_phone'] = '+91 9876543210';
        $_SESSION['user_address'] = '123 Main St, City, State';
        $_SESSION['user_join_date'] = '2024-01-01';
        $_SESSION['user_id'] = 'USR001';
        
        echo "Login successful! Session data set.";
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        echo '<a href="test_auth.php">Test Session</a> | <a href="test_auth.php?logout=1">Logout</a>';
    } else {
        echo "Invalid credentials. Try user@bookyard.com / user123";
    }
} elseif (isset($_GET['logout'])) {
    session_destroy();
    echo "Logged out successfully!";
    echo '<br><a href="test_auth.php">Login Again</a>';
} else {
    // Check if user is logged in
    if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
        echo "User is logged in!";
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        echo '<a href="test_auth.php?logout=1">Logout</a>';
    } else {
        echo "User is not logged in.";
        echo '<br><a href="test_auth.php">Login</a>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Authentication Test</title>
</head>
<body>
    <h1>Authentication Test</h1>
    
    <?php if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true): ?>
    <form method="POST">
        <h2>Login Test</h2>
        <p>Email: <input type="email" name="email" value="user@bookyard.com"></p>
        <p>Password: <input type="password" name="password" value="user123"></p>
        <p><input type="submit" value="Login"></p>
    </form>
    <?php endif; ?>
    
    <hr>
    
    <h2>Current Session Status:</h2>
    <pre>
Session ID: <?php echo session_id(); ?>
Session Status: <?php echo session_status(); ?>
Session Data: <?php print_r($_SESSION); ?>
    </pre>
</body>
</html>

<?php
// Check if session is already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destroy all session variables
session_unset();
session_destroy();

// Redirect to home page
header("Location: ../Home.php");
exit();
?>

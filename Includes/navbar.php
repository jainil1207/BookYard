<?php
// Check if session is already started
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;

// Get current page for active state
$currentPage = basename($_SERVER['PHP_SELF']);
$currentPage = str_replace('Auth/', '', $currentPage); // Remove Auth/ prefix if present
$currentPage = str_replace('User/', '', $currentPage); // Remove User/ prefix if present
?>

<!-- Include required CSS and JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Simple navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-black fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/cie1/BookYard/Home.php" style="color: #ffffff; font-weight: bold;">BookYard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto mr-8">
        <li class="nav-item ml-3">
          <a class="nav-link <?php echo $currentPage == 'Home.php' ? 'active' : ''; ?>" href="/cie1/BookYard/Home.php" style="color: #ffffff;">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link <?php echo $currentPage == 'Shop.php' ? 'active' : ''; ?>" href="/cie1/BookYard/Shop.php" style="color: #ffffff;">Shop</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link <?php echo $currentPage == 'AboutUs.php' ? 'active' : ''; ?>" href="/cie1/BookYard/AboutUs.php" style="color: #ffffff;">About</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link <?php echo $currentPage == 'Contact.php' ? 'active' : ''; ?>" href="/cie1/BookYard/Contact.php" style="color: #ffffff;">Contact</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <?php if ($isLoggedIn): ?>
          <!-- User Menu when logged in -->
          <li class="nav-item dropdown me-3">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff;">
              <i class="fas fa-user-circle"></i> <?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'User'; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" style="background-color: #000000; border: 1px solid #ffffff;">
              <a class="dropdown-item" href="/cie1/BookYard/User/dashboard.php" style="color: #ffffff;">
                <i class="fas fa-tachometer-alt"></i> Dashboard
              </a>
              <a class="dropdown-item" href="/cie1/BookYard/User/profile.php" style="color: #ffffff;">
                <i class="fas fa-user"></i> Profile
              </a>
              <a class="dropdown-item" href="/cie1/BookYard/User/orders.php" style="color: #ffffff;">
                <i class="fas fa-shopping-bag"></i> My Orders
              </a>
              <div class="dropdown-divider" style="border-color: #ffffff;"></div>
              <a class="dropdown-item" href="/cie1/BookYard/Auth/logout.php" style="color: #ffffff;">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        <?php
else: ?>
          <!-- Login/Signup when not logged in -->
          <li class="nav-item me-3">
            <form class="d-flex" method="GET" action="Shop.php">
              <input class="form-control me-2" type="search" name="search" placeholder="Search books..." aria-label="Search" style="border-radius: 20px; border: 1px solid #ffffff; background-color: #000000; color: #ffffff;">
              <button class="btn btn-outline-light" type="submit" style="border-color: #ffffff; color: #ffffff;">
                <i class="fas fa-search"></i>
              </button>
            </form>
          </li>

          <li class="nav-item">
            <a class="btn btn-outline-light rounded-pill" href="#" data-bs-toggle="modal" data-bs-target="#loginModal" style="border-color: #ffffff; color: #ffffff; background-color: transparent;">Login</a>
          </li>

          <li class="nav-item ms-3">
            <a class="btn btn-light rounded-pill" href="#" data-bs-toggle="modal" data-bs-target="#signupModal" style="background-color: #ffffff; border-color: #ffffff; color: #000000;">Sign up</a>
          </li>
        <?php
endif; ?>
      </ul>
    </div>
  </div>
</nav>

<style>
.navbar-nav .nav-link.active {
  border-bottom: 2px solid #ffffff;
  padding-bottom: 8px;
}
.dropdown-item {
  color: #ffffff !important;
  background-color: #000000 !important;
}
.dropdown-item:hover {
  color: #000000 !important;
  background-color: #ffffff !important;
}
.dropdown-menu {
  background-color: #000000 !important;
  border: 1px solid #ffffff !important;
}
.dropdown-divider {
  border-color: #ffffff !important;
}
</style>

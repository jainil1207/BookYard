<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .navbar {
    display: flex;
    justify-content: space-between;
    padding: 15px 40px;
    background: rgba(0,0,0,0.7);
    position: fixed;
    width:100%;
    padding: auto;
    color: white;
}

.navbar nav a {
    color: white;
    margin: 0 10px;
    text-decoration: none;
}



.btn {
    background: #e67e22;
    border: none;
    padding: 8px 14px;
    color: white;
    cursor: pointer;
    border-radius: 5px;
}

    </style>
</head>
<body>
     <!-- Navbar -->
<header class="navbar">
    <h2><div class="logo">🕮Library</div></h2>
    <nav>
        <a class="a1" href="index.php">Home</a>
        <button class="btn btn-dark"><a href="login.php" class="text-white text-decoration-none">Login</a></button>
        <button class="btn btn-dark"><a href="register.php" class="text-white text-decoration-none">Register</a></button>

    </nav>
</header>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->

</body>
</html>
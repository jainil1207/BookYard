<!-- <!DOCTYPE html>
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
     Navbar
<header class="navbar">
    <h2><div class="logo">🕮Library</div></h2>
    <nav>
        <a class="a1" href="index.php">Home</a>
        <button class="btn btn-dark"><a href="login.php" class="text-white text-decoration-none">Login</a></button>
        <button class="btn btn-dark"><a href="register.php" class="text-white text-decoration-none">Register</a></button>

    </nav>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Hide checkbox */
        #menu-toggle-checkbox {
            display: none;
        }

        /* Menu Button */
        .menu-btn {
            top: 5px;
            left: 5px;
            font-size: 20px;
            cursor: pointer;
            z-index: 1100;
            border-radius: 5px;
        }

        /* Sidebar */
        #sidebar {
            position: fixed;
            top: 0;
            left: -260px;
            width: 260px;
            height: 100%;
            background: #212529 border-box;
            padding-top: 0px;
            transition: all 0.3s ease;
            z-index: 999;
        }

        /* When checkbox checked → show sidebar */
        #menu-toggle-checkbox:checked~#sidebar {
            left: 0;
        }

        /* Sidebar Design */
        #sidebar .title {
            color: #fff;
            text-align: center;
            padding: 0px;
            top: 0;
            font-size: 18px;
            background: #212529;
            border: #343a40;
        }

        #sidebar ul {
            list-style: none;
            padding: 0;
        }

        #sidebar ul li {
            padding: 15px 20px;
        }

        #sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
        }

        #sidebar ul li:hover {
            background: #343a40;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top border-bottom shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">📚 My Online Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="abhi/index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Rajvi_lunagariya/nav/profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="Rajvi_lunagariya/nav/About.php">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="Rajvi_lunagariya/nav/feedback.php">Feed back</a></li>
                    <button class="btn btn-dark"><a href="login.php" class="text-white text-decoration-none">Login</a></button>
                    <button class="btn btn-dark"><a href="register.php" class="text-white text-decoration-none">Register</a></button>

                    <input type="checkbox" id="menu-toggle-checkbox">

                    <label for="menu-toggle-checkbox" class="menu-btn text-white bg-dark p-2 position-fixed border rounded">
                        ☰
                    </label>

                    <div id="sidebar">
                        <div class="title mt-3">📚 Side Menu</div>
                        <ul>
                            <li><a href="../sidebar/Categories.php">Categories</a></li>
                            <li><a href="../sidebar/Digital Resources.php">Digital Resources</a></li>
                            <li><a href="../sidebar/price.php">Price</a></li>
                            <li><a href="../sidebar/Suggetions.php">Suggestion</a></li>
                            <li><a href="../sidebar/My books.php">My Library</a></li>
                            <li><a href="../sidebar/Tutorial.php">Tutorials</a></li>
                            <li><a href="../sidebar/Downloads.php">Shoping</a></li>
                        </ul>
                    </div>





    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
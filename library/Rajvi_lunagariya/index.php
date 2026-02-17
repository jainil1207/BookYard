<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
 <style> /* Hide checkbox */
#menu-toggle-checkbox{
    display:none;
}

/* Menu Button */
.menu-btn{
    top:5px;
    left:5px;
    font-size:20px;
    cursor:pointer;
    z-index:1100;
    border-radius:5px;
}

/* Sidebar */
#sidebar{
    position:fixed;
    top:0;
    left:-260px;
    width:260px;
    height:100%;
    background:#212529;
    padding-top:0px;
    transition:all 0.3s ease;
    z-index:999;
}

/* When checkbox checked → show sidebar */
#menu-toggle-checkbox:checked ~ #sidebar{
    left:0;
}

/* Sidebar Design */
#sidebar .title{
    color:#fff;
    text-align:center;
    padding:0px;
    top: 0;
    font-size:18px;
    background:#212529;
}

#sidebar ul{
    list-style:none;
    padding:0;
}

#sidebar ul li{
    padding:15px 20px;
}

#sidebar ul li a{
    color:#fff;
    text-decoration:none;
    display:block;
}

#sidebar ul li:hover{
    background:#343a40;
}


</style>
</head>
<body>

<!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">📚 My Online Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="nav/profile.php">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="nav/About.php">About us</a></li>
            <li class="nav-item"><a class="nav-link" href="nav/Preference.php">Peference</a></li>
            <li class="nav-item"><a class="nav-link" href="nav/feedback.php">Feed back</a></li>
 <input type="checkbox" id="menu-toggle-checkbox">

<label for="menu-toggle-checkbox" class="menu-btn text-white bg-dark p-2 position-fixed">
    ☰
</label>

<div id="sidebar">
    <div class="title mt-3">📚 Side Menu</div>
    <ul>
        <li><a href="sidebar/Categories.php">Categories</a></li>
        <li><a href="sidebar/Digital Resources.php">Digital Resources</a></li>
        <li><a href="sidebar/price.php">Price</a></li>
        <li><a href="sidebar/In offers.php">In Offers</a></li>
        <li><a href="sidebar/My books.php">My Library</a></li>
        <li><a href="sidebar/Tutorials.php">Tutorials</a></li>
        <li><a href="sidebar/Downloads.php">Shoping</a></li>
    </ul>
</div>

  

   

  
</nav>


















<!-- Hero Section -->
<section class="bg-light text-center p-5">
    <div class="container">
        <h1 class="display-4 m-4">Welcome to Our Online Library</h1>
        <p class="lead">Explore thousands of books anytime, anywhere.</p>

        <!-- Search Bar -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-6 d-flex">
                <button class="btn btn-dark ms-2">Search</button>
                <input type="text" class="form-control form-control-lg" placeholder="Search for books...">
        </div>
        </div>
    </div>
</section>

<!-- Categories -->
<section class="container my-5 bg-dark text-white p-4 rounded">
    <h2 class="text-center mb-4">Book Categories</h2>
    
           <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imagis/c1.jpg" class="d-block mx-auto" height="300" width="400" alt="Slide 1">
                </div>

                <div class="carousel-item">
                    <img src="imagis/civil.jpg" class="d-block mx-auto" height="300" width="400" alt="Slide 2">
                </div>

                <div class="carousel-item">
                    <img src="imagis/grafics.jpg" class="d-block mx-auto" height="300" width="400" alt="Slide 3">
                </div>

                <div class="carousel-item">
                    <img src="imagis/robotics.jpg" class="d-block mx-auto" height="300" width="400" alt="Slide 4">
                </div>

                <div class="carousel-item">
                    <img src="imagis/ai-ml.jpg" class="d-block mx-auto" height="300" width="400" alt="Slide 5">
                </div>

                <div class="carousel-item">
                    <img src="imagis/c1.jpg" class="d-block mx-auto" height="300" width="300" alt="Slide 5">
                </div>
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
</section>

<div class="row text-center">
        <div class="col-md-4 p-3">
            <div class="card p-3 shadow-sm">
                <h5>📖 Computere</h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>📖 Robotics</h5>
            </div>
        </div>
        <div class="col-md-4 p-3">
            <div class="card p-3 shadow-sm">
                <h5>📖 Civil</h5>
            </div>
        </div>
        <div class="col-md-4 p-3">
            <div class="card p-3 shadow-sm">
                <h5>🔬 Mechinical</h5>
            </div>
        </div>
        <div class="col-md-4 p-3">
            <div class="card p-3 shadow-sm">
                <h5>💻 Grafics</h5>
            </div>
        </div>
        <div class="col-md-4 p-3">
            <div class="card p-3 shadow-sm">
                <h5>📜 Ai ml</h5>
            </div>
        </div>
    </div>


    

!-- Categories -->
<section class="container my-5 bg-dark text-white p-4 rounded">
    <h2 class="text-center mb-4">Book Categories</h2>
    
           <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imagis/c1.jpg" class="d-block mx-auto" height="300" width="400" alt="Slide 1">
                </div>

                <div class="carousel-item">
                    <img src="imagis/civil.jpg" class="d-block mx-auto" height="300" width="400" alt="Slide 2">
                </div>

                <div class="carousel-item">
                    <img src="imagis/grafics.jpg" class="d-block mx-auto" height="300" width="400" alt="Slide 3">
                </div>

                <div class="carousel-item">
                    <img src="imagis/robotics.jpg" class="d-block mx-auto" height="300" width="400" alt="Slide 4">
                </div>

                <div class="carousel-item">
                    <img src="imagis/ai-ml.jpg" class="d-block mx-auto" height="300" width="400" alt="Slide 5">
                </div>

                <div class="carousel-item">
                    <img src="imagis/c1.jpg" class="d-block mx-auto" height="300" width="300" alt="Slide 5">
                </div>
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
</section>

<div class="row text-center">
        <div class="col-md-4 p-3">
            <div class="card p-3 shadow-sm">
                <h5>📖 Fiction</h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>📖 Fiction</h5>
            </div>
        </div>
        <div class="col-md-4 p-3">
            <div class="card p-3 shadow-sm">
                <h5>📖 Fiction</h5>
            </div>
        </div>
        <div class="col-md-4 p-3">
            <div class="card p-3 shadow-sm">
                <h5>🔬 Science</h5>
            </div>
        </div>
        <div class="col-md-4 p-3">
            <div class="card p-3 shadow-sm">
                <h5>💻 Technology</h5>
            </div>
        </div>
        <div class="col-md-4 p-3">
            <div class="card p-3 shadow-sm">
                <h5>📜 History</h5>
            </div>
        </div>
    </div>
<!-- Featured Books  -->
 <section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">Featured Books</h2>
        <div class="row">

            <div class="col-md-4">
                <div class="card shadow">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 1</h5>
                        <p class="card-text">Short description of the book.</p>
                        <a href="imagis/homeee.htm" class="btn btn-dark">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 2</h5>
                        <p class="card-text">Short description of the book.</p>
                        <a href="#" class="btn btn-dark">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 3</h5>
                        <p class="card-text">Short description of the book.</p>
                        <a href="#" class="btn btn-dark">Read More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center p-3">
    <p class="mb-0">© 2026 My Online Library | All Rights Reserved</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

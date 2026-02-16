<?php include '../nave.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="nave.php">
        <style>
            /* =========================
   CATEGORY CARDS
========================= */

.category-card{
    border: none;
    border-radius: 12px;
    overflow: hidden;
    transition: 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.4);
}

.category-card img{
    height: 200px;
    object-fit: cover;
}

.category-card:hover{
    transform: translateY(-10px);
    box-shadow: 0 10px 25px rgba(13,110,253,0.6);
}

            </style>

</head>
<body>

<?php include '../nave.php'; ?>
    <!-- =========================
     BOOK CATEGORIES
========================= -->

<div class="container mt-5">
    
    <h2 class="text-center text-dark pt-5 pb-5">Book Categories</h2>

    <div class="row g-4 pb-5">

        <!-- Category 1 -->
        <div class="col-md-4">
            <div class="card category-card bg-dark text-white">
                <img src="fiction.jpg" class="card-img-top" alt="Fiction">
                <div class="card-body text-center">
                    <h5 class="card-title">AI_ML</h5>
                    <p class="card-text">Explore imaginative and creative stories.</p>
                    <a href="../Sidebar/AI_ML.php" class="btn btn-dark bg-white text-dark">View Books</a>
                </div>
            </div>
        </div>

        <!-- Category 2 -->
        <div class="col-md-4">
            <div class="card category-card bg-dark text-white">
                <img src="education.jpg" class="card-img-top" alt="Education">
                <div class="card-body text-center">
                    <h5 class="card-title">Civil</h5>
                    <p class="card-text">Academic and learning materials.</p>
                    <a href="../Sidebar/Civil.php" class="btn btn-dark bg-white text-dark">View Books</a>
                </div>
            </div>
        </div>

        <!-- Category 3 -->
        <div class="col-md-4">
            <div class="card category-card bg-dark text-white">
                <img src="technology.jpg" class="card-img-top" alt="Technology">
                <div class="card-body text-center">
                    <h5 class="card-title">Computer_It</h5>
                    <p class="card-text">Programming and technical resources.</p>
                    <a href="../Sidebar/Computer_It.php" class="btn btn-dark bg-white text-dark">View Books</a>
                </div>
            </div>
        </div>

        <!-- Category 4 -->
        <div class="col-md-4">
            <div class="card category-card bg-dark text-white">
                <img src="history.jpg" class="card-img-top" alt="History">
                <div class="card-body text-center">
                    <h5 class="card-title">Grafics</h5>
                    <p class="card-text">Learn about past events and civilizations.</p>
                    <a href="../Sidebar/Grafics.php" class="btn btn-dark bg-white text-dark">View Books</a>
                </div>
            </div>
        </div>

        <!-- Category 5 -->
        <div class="col-md-4">
            <div class="card category-card bg-dark text-white">
                <img src="business.jpg" class="card-img-top" alt="Business">
                <div class="card-body text-center">
                    <h5 class="card-title">Mechanical</h5>
                    <p class="card-text">Entrepreneurship and finance books.</p>
                    <a href="../Sidebar/Michanical.php" class="btn btn-dark bg-white text-dark">View Books</a>
                </div>
            </div>
        </div>

        <!-- Category 6 -->
        <div class="col-md-4">
            <div class="card category-card bg-dark text-white">
                <img src="science.jpg" class="card-img-top" alt="Science">
                <div class="card-body text-center">
                    <h5 class="card-title">Robotics</h5>
                    <p class="card-text">Discover scientific knowledge.</p>
                    <a href="../Sidebar/Robotics.php" class="btn btn-dark bg-white text-dark">View Books</a>
                </div>
            </div>
        </div>

    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include '../footer.php'; ?>

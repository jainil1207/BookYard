<?php include '../nave.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            /* =========================
   DIGITAL RESOURCES
========================= */

.resource-card{
    border: none;
    border-radius: 12px;
    transition: 0.3s;
    box-shadow: 0 5px 15px rgba(0,0,0,0.4);
}

.resource-icon{
    font-size: 50px;
}

.resource-card:hover{
    transform: translateY(-10px);
    box-shadow: 0 10px 25px rgba(13,110,253,0.6);
}

            </style>

</head>
<body>
<!-- =========================
     DIGITAL RESOURCES
========================= -->

<div class="container mt-5">
    
    <h2 class="text-center text-dark mb-4 pt-5">Digital Resources</h2>

    <div class="row g-4 pb-5" >

        <!-- E-Books -->
        <div class="col-md-4">
            <div class="card resource-card bg-dark text-white">
                <div class="card-body text-center">
                    <div class="resource-icon">📘</div>
                    <h5 class="card-title mt-3">E-Books</h5>
                    <p class="card-text">Download and read digital books anytime.</p>
                    <a href="ebooks.php" class="btn btn-primary">Explore</a>
                </div>
            </div>
        </div>

        <!-- Video Lectures -->
        <div class="col-md-4">
            <div class="card resource-card bg-dark text-white">
                <div class="card-body text-center">
                    <div class="resource-icon">🎥</div>
                    <h5 class="card-title mt-3">Video Lectures</h5>
                    <p class="card-text">Watch educational tutorials and courses.</p>
                    <a href="videos.php" class="btn btn-primary">Explore</a>
                </div>
            </div>
        </div>

        <!-- PDF Notes -->
        <div class="col-md-4">
            <div class="card resource-card bg-dark text-white">
                <div class="card-body text-center">
                    <div class="resource-icon">📄</div>
                    <h5 class="card-title mt-3">PDF Notes</h5>
                    <p class="card-text">Access study materials and notes easily.</p>
                    <a href="pdfs.php" class="btn btn-primary">Explore</a>
                </div>
            </div>
        </div>

        <!-- Audiobooks -->
        <div class="col-md-4">
            <div class="card resource-card bg-dark text-white">
                <div class="card-body text-center">
                    <div class="resource-icon">🎧</div>
                    <h5 class="card-title mt-3">Audiobooks</h5>
                    <p class="card-text">Listen to books anytime, anywhere.</p>
                    <a href="audiobooks.php" class="btn btn-primary">Explore</a>
                </div>
            </div>
        </div>

        <!-- Practice Tests -->
        <div class="col-md-4">
            <div class="card resource-card bg-dark text-white">
                <div class="card-body text-center">
                    <div class="resource-icon">📝</div>
                    <h5 class="card-title mt-3">Practice Tests</h5>
                    <p class="card-text">Test your knowledge with quizzes.</p>
                    <a href="tests.php" class="btn btn-primary">Explore</a>
                </div>
            </div>
        </div>

       
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include '../footer.php'; ?>

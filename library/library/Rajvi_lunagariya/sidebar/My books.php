<?php include '../nave.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Purchased Books</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .page-title {
            font-weight: 700;
            letter-spacing: 1px;
        }

        .book-card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .book-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .book-card img {
            height: 250px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .purchase-date {
            font-size: 13px;
            color: #28a745;
            font-weight: 500;
        }

        .progress {
            height: 8px;
            border-radius: 10px;
        }

        .btn-read {
            background-color: #0d6efd;
            color: #fff;
            font-weight: 500;
        }

        .btn-read:hover {
            background-color: #0b5ed7;
        }

        .btn-download {
            font-weight: 500;
        }

        footer {
            margin-top: 60px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">MyBookStore</a>
  </div>
</nav>

<!-- Main Section -->
<div class="container py-5">
    <h2 class="text-center page-title mb-5">📚 My Purchased Books</h2>

    <div class="row g-4">

        <!-- Book 1 -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card book-card shadow-sm h-100">
                <img src="https://source.unsplash.com/300x400/?book,1" class="card-img-top" alt="Book">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Atomic Habits</h5>
                    <p class="text-muted mb-1">James Clear</p>
                    <p class="purchase-date">Purchased: 10 Jan 2026</p>

                    <!-- Progress Bar -->
                    <div class="mt-2">
                        <small>Reading Progress</small>
                        <div class="progress">
                            <div class="progress-bar bg-success pb-3" style="width: 60%"></div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="mt-auto d-grid gap-2 mt-3 pt-3">
                        <button class="btn btn-read bg-dark "><a href="TUTORIAL - 3.pdf" class="text-white text-decoration-none">Read Now</a></button>
                        <button class="btn btn-outline-secondary btn-download">Download</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Book 2 -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card book-card shadow-sm h-100">
                <img src="https://source.unsplash.com/300x400/?book,2" class="card-img-top" alt="Book">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Deep Work</h5>
                    <p class="text-muted mb-1">Cal Newport</p>
                    <p class="purchase-date">Purchased: 18 Jan 2026</p>

                    <div class="mt-2">
                        <small>Reading Progress</small>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 30%"></div>
                        </div>
                    </div>

                    <div class="mt-auto d-grid gap-2 mt-3 pt-3">
                        <button class="btn btn-read bg-dark"><a href="TUTORIAL - 3.pdf" class="text-white text-decoration-none">Read Now</a></button>
                        <button class="btn btn-outline-secondary btn-download">Download</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add More Books Here -->

    </div>

    <!-- Empty State (Show if no books purchased) -->
    <!--
    <div class="text-center mt-5">
        <h4 class="text-muted">You haven't purchased any books yet.</h4>
        <a href="books.html" class="btn btn-primary mt-3">Browse Books</a>
    </div>
    -->

</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    © 2026 MyBookStore | All Rights Reserved
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


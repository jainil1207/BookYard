<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookYard - Your Digital Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            padding-top: 80px;
            background-color: #000000;
            color: #ffffff;
        }
        .hero-section {
            background: #000000;
            color: #ffffff;
            padding: 80px 0;
            margin-bottom: 50px;
        }
        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        .book-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            border: 1px solid #ffffff;
            box-shadow: 0 2px 10px rgba(255,255,255,0.1);
            background-color: #000000;
            color: #ffffff;
        }
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(255,255,255,0.15);
        }
        .book-cover {
            height: 250px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }
        .section-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 30px;
            color: #ffffff;
            position: relative;
            padding-bottom: 15px;
            display: inline-block;
        }
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: #ffffff;
        }
        .feature-box {
            text-align: center;
            padding: 30px 20px;
            border-radius: 10px;
            background: #000000;
            border: 1px solid #ffffff;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
            color: #ffffff;
        }
        .feature-box:hover {
            transform: translateY(-5px);
        }
        .feature-icon {
            font-size: 3rem;
            color: #ffffff;
            margin-bottom: 20px;
        }
        .cta-section {
            background: #000000;
            border: 1px solid #ffffff;
            color: #ffffff;
            padding: 60px 0;
            text-align: center;
            margin-top: 50px;
        }
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            .hero-subtitle {
                font-size: 1rem;
            }
            body {
                padding-top: 60px;
            }
        }
        .book-card-custom {
            border: 1px solid #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(255,255,255,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            background-color: #000000;
            color: #ffffff;
        }
        .book-card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(255,255,255,0.2);
        }
        .book-card-custom .img-placeholder {
            background: #ffffff;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .book-card-custom .img-placeholder i {
            font-size: 60px;
            color: #000000;
        }
        .book-card-custom .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .book-card-custom .card-title {
            font-weight: bold;
            color: #ffffff;
        }
        .book-card-custom .card-text {
            color: #cccccc;
            font-size: 0.9rem;
        }
        .book-card-custom .price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #ffffff;
        }
        .book-card-custom .btn-add-to-cart {
            background-color: #ffffff;
            border-color: #ffffff;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
            padding: 8px 20px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            color: #000000;
        }
        .book-card-custom .btn-add-to-cart:hover {
            background-color: #cccccc;
            border-color: #cccccc;
            color: #000000;
        }
    </style>
</head>
<body>
    <?php include 'Includes/navbar.php'; ?>
    <?php include 'Auth/login.php'; ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title">Welcome to BookYard</h1>
                    <p class="hero-subtitle">Discover your next favorite book from our vast digital library. Thousands of titles at your fingertips.</p>
                    <div class="hero-buttons">
                        <a href="#featured" class="btn btn-light btn-lg me-3">Browse Books</a>
                        <a href="Auth/Signup.php" class="btn btn-outline-light btn-lg">Join Free</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <i class="fas fa-book-open" style="font-size: 8rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Why Choose BookYard?</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-book-reader"></i>
                        </div>
                        <h4>Read Anywhere</h4>
                        <p>Access your books on any device, anytime, anywhere. Perfect for reading on the go.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-infinity"></i>
                        </div>
                        <h4>Unlimited Access</h4>
                        <p>Enjoy unlimited reading with our extensive collection of books across all genres.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-download"></i>
                        </div>
                        <h4>Download & Read Offline</h4>
                        <p>Download your favorite books and read them offline whenever you want.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Books Section -->
    <section id="featured" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">Featured Books</h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">The Great Adventure</h5>
                            <p class="card-text">An epic journey through uncharted territories.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$9.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Mystery Tales</h5>
                            <p class="card-text">Suspenseful stories that will keep you guessing.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$12.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Science Today</h5>
                            <p class="card-text">Latest discoveries and scientific breakthroughs.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$14.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Love Stories</h5>
                            <p class="card-text">Romantic tales that touch the heart.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$10.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="#" class="btn btn-lg" style="background-color: #ffffff; color: #000000; border: 1px solid #ffffff;">View All Books</a>
            </div>
        </div>
    </section>

    <!-- Book Cards Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Popular Books</h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Digital Marketing</h5>
                            <p class="card-text">Learn modern digital marketing strategies and techniques.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$19.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Web Development</h5>
                            <p class="card-text">Master HTML, CSS, JavaScript and modern frameworks.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$24.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">UI/UX Design</h5>
                            <p class="card-text">Create beautiful user interfaces and experiences.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$22.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Mobile Apps</h5>
                            <p class="card-text">Develop applications for iOS and Android platforms.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$27.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Browse by Category</h2>
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                    <div class="text-center">
                        <div class="bg-light rounded-circle p-4 mb-2" style="background-color: #ffffff !important;">
                            <i class="fas fa-building fa-2x" style="color: #000000;"></i>
                        </div>
                        <h6>Civil Engineering</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                    <div class="text-center">
                        <div class="bg-light rounded-circle p-4 mb-2" style="background-color: #ffffff !important;">
                            <i class="fas fa-laptop-code fa-2x" style="color: #000000;"></i>
                        </div>
                        <h6>Computer Engineering</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                    <div class="text-center">
                        <div class="bg-light rounded-circle p-4 mb-2" style="background-color: #ffffff !important;">
                            <i class="fas fa-brain fa-2x" style="color: #000000;"></i>
                        </div>
                        <h6>AI & ML</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                    <div class="text-center">
                        <div class="bg-light rounded-circle p-4 mb-2" style="background-color: #ffffff !important;">
                            <i class="fas fa-palette fa-2x" style="color: #000000;"></i>
                        </div>
                        <h6>Graphic Designing</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                    <div class="text-center">
                        <div class="bg-light rounded-circle p-4 mb-2" style="background-color: #ffffff !important;">
                            <i class="fas fa-cogs fa-2x" style="color: #000000;"></i>
                        </div>
                        <h6>Mechanical Engineering</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                    <div class="text-center">
                        <div class="bg-light rounded-circle p-4 mb-2" style="background-color: #ffffff !important;">
                            <i class="fas fa-bolt fa-2x" style="color: #000000;"></i>
                        </div>
                        <h6>Electrical Engineering</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="mb-4">Ready to Start Reading?</h2>
            <p class="lead mb-4">Join thousands of readers who have already discovered their next favorite book.</p>
            <a href="Auth/Signup.php" class="btn btn-light btn-lg me-3">Get Started Free</a>
            <a href="#featured" class="btn btn-outline-light btn-lg">Browse Books</a>
        </div>
    </section>

    <?php include 'Includes/footer.php'; ?>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php include 'Auth/login.php'; ?>
</body>
</html>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - BookYard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            padding-top: 80px;
            background-color: #000000;
            color: #ffffff;
        }
        .category-section {
            margin-bottom: 60px;
        }
        .category-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 30px;
            color: #ffffff;
            position: relative;
            padding-bottom: 15px;
            display: inline-block;
        }
        .category-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: #ffffff;
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
        @media (max-width: 768px) {
            body {
                padding-top: 60px;
            }
        }
    </style>
</head>
<body>
   <?php include 'Includes/navbar.php'; ?>
    <?php include 'Auth/login.php'; ?>

    <div class="container">
        <h1 class="text-center mb-5">Shop Books by Category</h1>

        <!-- Civil Engineering Section -->
        <section class="category-section">
            <h2 class="category-title">Civil Engineering</h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Structural Analysis</h5>
                            <p class="card-text">Comprehensive guide to structural engineering principles.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$45.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-road"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Highway Engineering</h5>
                            <p class="card-text">Modern road design and construction techniques.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$52.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-water"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Hydraulics</h5>
                            <p class="card-text">Fluid mechanics and hydraulic systems design.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$48.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-hard-hat"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Construction Management</h5>
                            <p class="card-text">Project management for construction projects.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$55.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Computer Engineering Section -->
        <section class="category-section">
            <h2 class="category-title">Computer Engineering</h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Algorithms</h5>
                            <p class="card-text">Data structures and algorithm design patterns.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$42.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-database"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Database Systems</h5>
                            <p class="card-text">Modern database design and optimization.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$38.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-network-wired"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Computer Networks</h5>
                            <p class="card-text">Networking protocols and architecture.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$44.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-microchip"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Computer Architecture</h5>
                            <p class="card-text">Processor design and computer organization.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$46.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- AI & ML Section -->
        <section class="category-section">
            <h2 class="category-title">AI & ML</h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Machine Learning Basics</h5>
                            <p class="card-text">Introduction to ML algorithms and applications.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$58.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-robot"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Deep Learning</h5>
                            <p class="card-text">Neural networks and deep learning frameworks.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$62.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Data Science</h5>
                            <p class="card-text">Statistical analysis and data visualization.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$54.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Natural Language Processing</h5>
                            <p class="card-text">Text processing and language understanding.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$60.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Graphic Designing Section -->
        <section class="category-section">
            <h2 class="category-title">Graphic Designing</h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Design Principles</h5>
                            <p class="card-text">Fundamentals of graphic design and composition.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$35.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-pen-nib"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Typography</h5>
                            <p class="card-text">Art of arranging type and font design.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$32.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-pencil-ruler"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Adobe Photoshop</h5>
                            <p class="card-text">Master photo editing and digital art.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$40.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-vector-square"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Illustrator & Vector Art</h5>
                            <p class="card-text">Creating scalable vector graphics.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$38.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mechanical Engineering Section -->
        <section class="category-section">
            <h2 class="category-title">Mechanical Engineering</h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Thermodynamics</h5>
                            <p class="card-text">Heat transfer and energy systems.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$49.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-wrench"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Mechanics of Materials</h5>
                            <p class="card-text">Stress analysis and material properties.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$47.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-gear"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Machine Design</h5>
                            <p class="card-text">Principles of mechanical component design.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$53.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-industry"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Manufacturing Processes</h5>
                            <p class="card-text">Modern manufacturing techniques and tools.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$51.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Electrical Engineering Section -->
        <section class="category-section">
            <h2 class="category-title">Electrical Engineering</h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Circuit Analysis</h5>
                            <p class="card-text">Electric circuits and network analysis.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$43.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-microchip"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Electronics</h5>
                            <p class="card-text">Semiconductor devices and circuits.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$45.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-satellite-dish"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Signal Processing</h5>
                            <p class="card-text">Digital signal processing techniques.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$56.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card book-card-custom">
                        <div class="img-placeholder">
                            <i class="fas fa-plug"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Power Systems</h5>
                            <p class="card-text">Electrical power generation and distribution.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">$59.99</span>
                                <button class="btn btn-add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php include 'Auth/login.php'; ?>
</body>
</html>
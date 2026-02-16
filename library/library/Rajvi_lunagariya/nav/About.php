<?php include '../nave.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .team-card {
            border-radius: 15px;
            transition: 0.3s;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .team-img {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid dark;
        }

        .social-icons a {
            font-size: 18px;
            margin: 0 8px;
            color:solid dark;
            transition: 0.3s;
        }

        .social-icons a:hover {
            color: #000;
        }
    </style>
</head>

<body>

<!-- Section -->
<section class="py-5">
    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-5 pt-5 bg-light shadow-sm p-4 rounded">
            <h2 class="fw-bold text-dark">About Us</h2>
            <p class="text-muted">Meet our dedicated and talented team members</p>
        </div>

        <div class="row g-4">

            <!-- Member 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card team-card border-0 shadow-sm h-100 text-center p-4">
                    <img src="" class="team-img mx-auto mb-3" alt="Rajvvi">
                    <h5 class="fw-bold">Rajvvi Lunagariya</h5>
                    <p class="text-dark mb-1">Computer Engineering Student</p>
                    <p class="small text-muted">
                        Passionate about software development and problem-solving.
                        Interested in web technologies and AI-based applications.
                    </p>
                    <p class="mb-1"><i class="fa-solid fa-phone"></i> 9106128068</p>
                    <p class="mb-3"><i class="fa-solid fa-envelope"></i> rlunagariya647@rku.ac.in</p>

                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <!-- Member 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card team-card border-0 shadow-sm h-100 text-center p-4">
                    <img src="IMG_20250111_200302.jpg" class="team-img mx-auto mb-3" alt="Jainil">
                    <h5 class="fw-bold">Jainil Trivedi</h5>
                    <p class="text-dark mb-1">Lead Developer</p>
                    <p class="small text-muted">
                        Responsible for backend architecture and system design.
                        Strong skills in Java, Python, and database management.
                    </p>
                    <p class="mb-1"><i class="fa-solid fa-phone"></i> 12233345566</p>
                    <p class="mb-3"><i class="fa-solid fa-envelope"></i> jainil@rku.ac.in</p>

                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <!-- Member 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card team-card border-0 shadow-sm h-100 text-center p-4">
                    <img src="IMG_20250111_200302.jpg" class="team-img mx-auto mb-3" alt="Abhy">
                    <h5 class="fw-bold">Abhy Vekariya</h5>
                    <p class="text-dark mb-1">Marketing Head</p>
                    <p class="small text-muted">
                        Handles marketing strategies, branding, and communication.
                        Focused on business growth and digital promotion.
                    </p>
                    <p class="mb-1"><i class="fa-solid fa-phone"></i> 80000056561</p>
                    <p class="mb-3"><i class="fa-solid fa-envelope"></i> abhy@rku.ac.in</p>

                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Company Introduction -->
<section class="py-5 bg-white">
    <div class="container text-center">
        <h3 class="fw-bold text-dark mb-3">Who We Are</h3>
        <p class="text-muted">
            We are a passionate and innovative team dedicated to delivering high-quality
            software solutions. Our focus is on creativity, teamwork, and continuous learning.
            We believe technology can solve real-world problems and create meaningful impact.
        </p>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="p-4 shadow-sm bg-white rounded">
                    <h4 class="text-dark">Our Mission</h4>
                    <p class="text-muted">
                        To provide innovative, reliable, and scalable solutions that empower
                        businesses and individuals to achieve their goals through technology.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4 shadow-sm bg-white rounded">
                    <h4 class="text-dark">Our Vision</h4>
                    <p class="text-muted">
                        To become a leading technology-driven organization known for creativity,
                        excellence, and customer satisfaction worldwide.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-5 bg-white">
    <div class="container text-center">
        <h3 class="fw-bold text-dark mb-4">Why Choose Us?</h3>
        <div class="row g-4">

            <div class="col-md-4">
                <div class="p-4 shadow-sm rounded">
                    <h5>✔ Professional Team</h5>
                    <p class="text-muted">Experienced members with strong technical skills.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 shadow-sm rounded">
                    <h5>✔ Quality Work</h5>
                    <p class="text-muted">We ensure high performance and reliability.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 shadow-sm rounded">
                    <h5>✔ 24/7 Support</h5>
                    <p class="text-muted">Always available to help and support clients.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-5 bg-dark text-white text-center">
    <div class="container">
        <div class="row g-4">

            <div class="col-md-3">
                <h2 class="fw-bold">50+</h2>
                <p>Projects Completed</p>
            </div>

            <div class="col-md-3">
                <h2 class="fw-bold">30+</h2>
                <p>Happy Clients</p>
            </div>

            <div class="col-md-3">
                <h2 class="fw-bold">5+</h2>
                <p>Years Experience</p>
            </div>

            <div class="col-md-3">
                <h2 class="fw-bold">100%</h2>
                <p>Client Satisfaction</p>
            </div>

        </div>
    </div>
</section>

<!-- Call To Action -->
<section class="py-5  bg-light text-center">
    <div class="container">
        <h3 class="fw-bold mb-3">Want to Work With Us?</h3>
        <p class="text-muted mb-4">
            Let’s collaborate and create something amazing together.
        </p>
        <a href="contact.php" class="btn btn-dark btn-lg">Contact Us</a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p class="mb-0">© 2026 Your Company Name | All Rights Reserved</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

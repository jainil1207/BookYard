<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - BookYard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            padding-top: 80px;
            background-color: #000000;
            color: #ffffff;
        }
        .about-section {
            background: #000000;
            border: 1px solid #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(255,255,255,0.1);
            padding: 40px;
            margin-bottom: 40px;
            color: #ffffff;
        }
        .team-member {
            text-align: center;
            padding: 30px 20px;
            background: #000000;
            border: 1px solid #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(255,255,255,0.1);
            transition: transform 0.3s ease;
            height: 100%;
            color: #ffffff;
        }
        .team-member:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(255,255,255,0.2);
        }
        .member-avatar {
            width: 120px;
            height: 120px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: #000000;
            font-size: 3rem;
            font-weight: bold;
        }
        .member-name {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 10px;
        }
        .member-contact {
            color: #cccccc;
            font-size: 1rem;
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
        @media (max-width: 768px) {
            body {
                padding-top: 60px;
            }
            .about-section {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
   <?php include 'Includes/navbar.php'; ?>
    <?php include 'Auth/login.php'; ?>

    <div class="container">
        <!-- About BookYard Section -->
        <section class="about-section">
            <div class="text-center mb-5">
                <h1 class="section-title">About BookYard</h1>
                <p class="lead">Your Digital Library for Engineering Excellence</p>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-center mb-4">
                        BookYard is a comprehensive digital platform dedicated to providing high-quality educational resources 
                        for engineering students and professionals. We specialize in curating the best books across various 
                        engineering disciplines to support your learning journey.
                    </p>
                    <p class="text-center mb-4">
                        Our mission is to make engineering education accessible, affordable, and engaging through our 
                        carefully selected collection of textbooks, reference materials, and professional guides.
                    </p>
                    <div class="text-center">
                        <h4>Our Vision</h4>
                        <p>To become the leading digital library for engineering education worldwide.</p>
                        
                        <h4 class="mt-4">Our Mission</h4>
                        <p>To empower engineering students and professionals with comprehensive learning resources.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Team Section -->
        <section class="team-section">
            <div class="text-center mb-5">
                <h2 class="section-title">Our Team</h2>
                <p class="lead">Meet the passionate individuals behind BookYard</p>
            </div>
            
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-member">
                        <div class="member-avatar">
                            JT
                        </div>
                        <h3 class="member-name">Jainil Trivedi</h3>
                        <p class="member-contact">
                            <i class="fas fa-envelope"></i> jainil@bookyard.com
                        </p>
                        <p class="text-muted">Founder & CEO</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-member">
                        <div class="member-avatar">
                            AV
                        </div>
                        <h3 class="member-name">Abhay Vekariya</h3>
                        <p class="member-contact">
                            <i class="fas fa-envelope"></i> abhay@bookyard.com
                        </p>
                        <p class="text-muted">Co-Founder & CTO</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-member">
                        <div class="member-avatar">
                            RL
                        </div>
                        <h3 class="member-name">Rajvi Lunagariya</h3>
                        <p class="member-contact">
                            <i class="fas fa-envelope"></i> rajvi@bookyard.com
                        </p>
                        <p class="text-muted">Head of Operations</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Info Section -->
        <section class="about-section">
            <div class="text-center">
                <h2 class="section-title">Get In Touch</h2>
                <p class="lead">We'd love to hear from you!</p>
                
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="mb-4">
                            <i class="fas fa-envelope fa-2x mb-3" style="color: #ffffff;"></i>
                            <h5>Email</h5>
                            <p>jt@bookyard.com</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <i class="fas fa-phone fa-2x mb-3" style="color: #ffffff;"></i>
                            <h5>Phone</h5>
                            <p>+91 6669996660</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <i class="fas fa-map-marker-alt fa-2x mb-3" style="color: #ffffff;"></i>
                            <h5>Location</h5>
                            <p>India</p>
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
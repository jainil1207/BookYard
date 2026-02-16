<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - BookYard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            padding-top: 80px;
            background-color: #000000;
            color: #ffffff;
        }
        .contact-section {
            background: #000000;
            border: 1px solid #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(255,255,255,0.1);
            padding: 40px;
            margin-bottom: 40px;
            color: #ffffff;
        }
        .contact-form {
            background: #000000;
            border: 1px solid #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(255,255,255,0.1);
            color: #ffffff;
        }
        .contact-info {
            background: #000000;
            border: 1px solid #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(255,255,255,0.1);
            height: 100%;
            color: #ffffff;
        }
        .contact-icon {
            font-size: 2rem;
            color: #ffffff;
            margin-bottom: 15px;
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
        .btn-submit {
            background-color: #ffffff;
            border-color: #ffffff;
            color: #000000;
            font-weight: bold;
            padding: 10px 30px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #cccccc;
            border-color: #cccccc;
            color: #000000;
        }
        .form-control:focus {
            border-color: #ffffff;
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
            background-color: #000000;
            color: #ffffff;
        }
        @media (max-width: 768px) {
            body {
                padding-top: 60px;
            }
            .contact-section {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <?php include 'Includes/navbar.php'; ?>
    <?php include 'Auth/login.php'; ?>

    <div class="container">
        <!-- Contact Header -->
        <section class="contact-section text-center mb-5">
            <h1 class="section-title">Contact Us</h1>
            <p class="lead">We'd love to hear from you! Get in touch with us for any questions or feedback.</p>
        </section>

        <!-- Contact Form and Info -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="contact-form">
                    <h3 class="mb-4">Send us a Message</h3>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" placeholder="John Doe" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" class="form-control" id="email" placeholder="john@example.com" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" placeholder="How can we help you?" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Tell us more about your inquiry..." required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="contact-info">
                    <h3 class="mb-4">Get in Touch</h3>
                    
                    <div class="mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h5>Email</h5>
                        <p>manager@bookyard.com</p>
                        <p>support@bookyard.com</p>
                    </div>

                    <div class="mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h5>Phone</h5>
                        <p>+91 6669996660</p>
                        <p>Mon-Fri: 9AM-6PM</p>
                    </div>

                    <div class="mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h5>Address</h5>
                        <p>BookYard Office</p>
                        <p>India</p>
                    </div>

                    <div class="mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h5>Business Hours</h5>
                        <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
                        <p>Saturday: 10:00 AM - 4:00 PM</p>
                        <p>Sunday: Closed</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Media Section -->
        <section class="contact-section text-center">
            <h3 class="mb-4">Follow Us</h3>
            <p class="mb-4">Connect with us on social media for updates and news</p>
            <div class="d-flex justify-content-center">
                <a href="#" class="btn mx-2 rounded-circle" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; background-color: #ffffff; color: #000000; border: 1px solid #ffffff;">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="btn mx-2 rounded-circle" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; background-color: #ffffff; color: #000000; border: 1px solid #ffffff;">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="btn mx-2 rounded-circle" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; background-color: #ffffff; color: #000000; border: 1px solid #ffffff;">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="btn mx-2 rounded-circle" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; background-color: #ffffff; color: #000000; border: 1px solid #ffffff;">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
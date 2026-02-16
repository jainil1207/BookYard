<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: ../Home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - BookYard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            padding-top: 80px;
            background-color: #000000;
            color: #ffffff;
        }
        .orders-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        .order-card {
            background: #000000;
            border: 1px solid #ffffff;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .order-header {
            border-bottom: 1px solid #ffffff;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }
        .book-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #333333;
        }
        .book-item:last-child {
            border-bottom: none;
        }
        .book-cover {
            width: 60px;
            height: 80px;
            background: #ffffff;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #000000;
        }
    </style>
</head>
<body>
    <?php include '../Includes/navbar.php'; ?>
    
    <div class="orders-container">
        <h2 class="mb-4">My Orders</h2>
        
        <!-- Order 1 -->
        <div class="order-card">
            <div class="order-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Order #ORD001</h5>
                        <p class="text-muted mb-0">Placed on January 15, 2024</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <span class="badge badge-success">Delivered</span>
                        <h5 class="mt-2">$89.96</h5>
                    </div>
                </div>
            </div>
            
            <div class="book-item">
                <div class="book-cover">
                    <i class="fas fa-book"></i>
                </div>
                <div class="flex-grow-1">
                    <h6>Structural Analysis</h6>
                    <p class="text-muted mb-0">Civil Engineering</p>
                </div>
                <div class="text-right">
                    <p class="mb-0">$45.99</p>
                    <small class="text-muted">Qty: 1</small>
                </div>
            </div>
            
            <div class="book-item">
                <div class="book-cover">
                    <i class="fas fa-code"></i>
                </div>
                <div class="flex-grow-1">
                    <h6>Algorithms</h6>
                    <p class="text-muted mb-0">Computer Engineering</p>
                </div>
                <div class="text-right">
                    <p class="mb-0">$42.99</p>
                    <small class="text-muted">Qty: 1</small>
                </div>
            </div>
        </div>
        
        <!-- Order 2 -->
        <div class="order-card">
            <div class="order-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Order #ORD002</h5>
                        <p class="text-muted mb-0">Placed on January 10, 2024</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <span class="badge badge-warning">In Transit</span>
                        <h5 class="mt-2">$58.99</h5>
                    </div>
                </div>
            </div>
            
            <div class="book-item">
                <div class="book-cover">
                    <i class="fas fa-brain"></i>
                </div>
                <div class="flex-grow-1">
                    <h6>Machine Learning Basics</h6>
                    <p class="text-muted mb-0">AI & ML</p>
                </div>
                <div class="text-right">
                    <p class="mb-0">$58.99</p>
                    <small class="text-muted">Qty: 1</small>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <p class="text-muted">Showing 2 orders</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include '../nave.php'; ?>
<?php
include 'validation_functions.php';

$success_message = '';
$error_messages = [];
$name = $email = $address = $payment = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $address = sanitizeInput($_POST['address']);
    $payment = sanitizeInput($_POST['payment']);
    
    $error_messages = validateFormData([
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'payment' => $payment
    ]);
    
    if (empty($error_messages)) {
        // Form is valid, process the order
        $success_message = "Order placed successfully! Thank you for your purchase.";
        // In a real application, you would save the order to a database here
        // Reset form fields after successful submission
        $name = $email = $address = '';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <script src="jquery.js"></script>
    <script src="validation.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">📚 Book Store</a>
    </div>
</nav>

<div class="container my-5">

    <h2 class="text-center mb-4">Available Books</h2>

    <!-- Book Section -->
    <div class="row g-4">

        <!-- Book 1 -->
        <div class="col-md-4">
            <div class="card book-card">
                <img src="https://via.placeholder.com/200x250" class="card-img-top">
                <div class="card-body text-center">
                    <h5 class="card-title">The Great Novel</h5>
                    <p class="price">$20</p>
                    <button class="btn btn-dark w-100">Add to Cart</button>
                </div>
            </div>
        </div>

        <!-- Book 2 -->
        <div class="col-md-4">
            <div class="card book-card">
                <img src="https://via.placeholder.com/200x250" class="card-img-top">
                <div class="card-body text-center">
                    <h5 class="card-title">Learning HTML</h5>
                    <p class="price">$15</p>
                    <button class="btn btn-dark w-100">Add to Cart</button>
                </div>
            </div>
        </div>

        <!-- Book 3 -->
        <div class="col-md-4">
            <div class="card book-card">
                <img src="https://via.placeholder.com/200x250" class="card-img-top">
                <div class="card-body text-center">
                    <h5 class="card-title">CSS Mastery</h5>
                    <p class="price">$25</p>
                    <button class="btn btn-dark w-100">Add to Cart</button>
                </div>
            </div>
        </div>

    </div>

    <!-- Cart Section -->
    <div class="mt-5">
        <h4>🛒 Cart Summary</h4>
        <ul class="list-group shadow-sm">
            <li class="list-group-item d-flex justify-content-between">
                The Great Novel <span>$20</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                Learning HTML <span>$15</span>
            </li>
            <li class="list-group-item d-flex justify-content-between total">
                <strong>Total</strong> <strong>$35</strong>
            </li>
        </ul>
    </div>

    <!-- Billing Section -->
    <div class="mt-5">
        <h4>🧾 Billing Details</h4>
        
        <?php if ($success_message): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($success_message); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($error_messages)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please fix the following errors:</strong>
                <ul class="mb-0">
                    <?php foreach ($error_messages as $field => $message): ?>
                        <li><?= htmlspecialchars($message); ?></li>
                    <?php endforeach; ?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <form class="billing-form shadow p-4" method="post" id="regform" novalidate>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($name); ?>" data-validation="required min alphabetic" data-min="3" data-max="50">
                    <span id="name_error" class="text-danger">
                        <?php if (isset($error_messages['name'])) echo htmlspecialchars($error_messages['name']); ?>
                    </span>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($email); ?>" data-validation="required email">
                    <span id="email_error" class="text-danger">
                        <?php if (isset($error_messages['email'])) echo htmlspecialchars($error_messages['email']); ?>
                    </span>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="address" rows="3" data-validation="required min" data-min="10"><?= htmlspecialchars($address); ?></textarea>
                <span id="address_error" class="text-danger">
                    <?php if (isset($error_messages['address'])) echo htmlspecialchars($error_messages['address']); ?>
                </span>
            </div>

            <div class="mb-3">
                <label class="form-label">Payment Method</label>
                <select class="form-select" name="payment" data-validation="required select">
                    <option value="" <?= $payment == '' ? 'selected' : ''; ?>>-- Select Payment Method --</option>
                    <option value="1" <?= $payment == '1' ? 'selected' : ''; ?>>Credit Card</option>
                    <option value="2" <?= $payment == '2' ? 'selected' : ''; ?>>Debit Card</option>
                    <option value="3" <?= $payment == '3' ? 'selected' : ''; ?>>Cash on Delivery</option>
                </select>
                <span id="payment_error" class="text-danger">
                    <?php if (isset($error_messages['payment'])) echo htmlspecialchars($error_messages['payment']); ?>
                </span>
            </div>

            <button type="submit" class="btn btn-success w-100">Place Order</button>
        </form>
    </div>

</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    © 2026 Online Book Store | All Rights Reserved
</footer>

</body>
</html>
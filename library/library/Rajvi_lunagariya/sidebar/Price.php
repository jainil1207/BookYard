<?php include '../nave.php'; ?>
v
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Books by Price</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5 " style="height: 400px;">
  <h1 class="mb-4 ">Books Grouped by Price</h1>

  <div class="row">
    <!-- Price Group 250 -->
    <div class="col-md-4">
      <div class="card mb-3">
        <div class="card-header bg-primary text-white">
          Price: ₹250
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">The Alchemist</li>
        </ul>
      </div>
    </div>

    <!-- Price Group 300 -->
    <div class="col-md-4">
      <div class="card mb-3">
        <div class="card-header bg-success text-white">
          Price: ₹300
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">1984</li>
          <li class="list-group-item">Animal Farm</li>
        </ul>
      </div>
    </div>

    <!-- Price Group 500 -->
    <div class="col-md-4">
      <div class="card mb-3">
        <div class="card-header bg-warning text-dark">
          Price: ₹500
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">The Pragmatic Programmer</li>
          <li class="list-group-item">Clean Code</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include '../footer.php'; ?>


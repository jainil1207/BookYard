<?php include '../nave.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="jquery.js"></script>
  <script src="validate.js"></script>
  <style>
    body {
      background: dark;
    }

    .feedback-container {
      max-width: 600px;
      margin: 50px auto;
      padding: 40px;
      background: dark;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: dark;
      font-weight: 700;
    }

    .form-label {
      font-weight: 500;
    }

    .btn-submit {
      width: 100%;
      padding: 12px;
      font-weight: 600;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .btn-submit:hover {
      background-color: dark;
      box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    }
  </style>
</head>
<body>

  <div class="feedback-container">
    <h2>Feedback Form</h2>
    <form action="" method="get" novalidate>
      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" data-validation="required min alphabetic" data-min="3" data-max="50">
        <span id="name_error" class="text-danger"></span>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" data-validation="required email">
        <span id="email_error" class="text-danger"></span>
      </div>

      <div class="mb-3">
        <label for="feedback" class="form-label">Your Feedback</label>
        <textarea class="form-control" id="feedback" name="feedback" rows="4" placeholder="Write your feedback here..." data-validation="required min" data-min="10"></textarea>
        <span id="feedback_error" class="text-danger"></span>
      </div>

      <div class="mb-3">
        <label class="form-label">Rate our service</label>
        <select class="form-select" id="rating" name="rating" data-validation="required select">
          <option  value="">Choose...</option>
          <option value="5">Excellent</option>
          <option value="4">Good</option>
          <option value="3">Average</option>
          <option value="2">Poor</option>
          <option value="1">Very Poor</option>
        </select>
        <span id="rating_error" class="text-danger"></span>
      </div>

      <button type="submit" class="btn btn-dark "> 
        <!-- <a href="after_submit.php" class="text-white text-decoration-none">Submit Feedback</a> --> submit
      </button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include '../footer.php'; ?>


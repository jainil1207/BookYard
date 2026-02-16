<?php include '../nave.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="jquery.js"></script>
  <script src="validate.js"></script>

  <style>
    body {
      background: #f2f7fb;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .contact-container {
      max-width: 600px;
      margin: 50px auto;
      background: #fff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .contact-container:hover {
      transform: translateY(-5px);
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 700;
      color: #343a40;
    }

    .form-control {
      border-radius: 8px;
      padding: 12px;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 5px rgba(13,110,253,0.5);
    }

    .btn-primary {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .alert {
      text-align: center;
      font-weight: 500;
    }

    @media (max-width: 576px) {
      .contact-container {
        padding: 25px;
      }
    }
  </style>
</head>
<body>

  <div class="container contact-container  ">
    <h2 class="text-center text-light bg-dark">Contact Us</h2>
    <form method="get" novalidate>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" data-validation="required min alphabetic" data-min="3" data-max="50">
        <span id="name_error" class="text-danger"></span>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" data-validation="required email">
        <span id="email_error" class="text-danger"></span>
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" rows="5" name="message" placeholder="Write your message" data-validation="required min" data-min="10"></textarea>
        <span id="message_error" class="text-danger"></span>
      </div>
      <button type="submit" class="btn btn-dark">Submit</button>
    </form>
    <!-- Success alert placeholder -->
    <div id="alertPlaceholder"></div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.getElementById('contactForm').addEventListener('submit', function(e){
      e.preventDefault();

      // Show Bootstrap alert
      const alertPlaceholder = document.getElementById('alertPlaceholder');
      alertPlaceholder.innerHTML = `
        <div class="alert alert-success mt-3" role="alert">
          Your message has been submitted successfully!
        </div>
      `;

      // Reset form fields
      this.reset();

      // Optional: Remove alert after 3 seconds
      setTimeout(() => {
        alertPlaceholder.innerHTML = '';
      }, 3000);
    });
  </script>
</body>
</html>
<?php include '../footer.php'; ?>


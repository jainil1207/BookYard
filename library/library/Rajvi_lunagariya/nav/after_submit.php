<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #d4d8e2, #555758);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .thank-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            max-width: 450px;
            animation: fadeIn 0.8s ease-in-out;
        }

        .thank-icon {
            font-size: 60px;
            color: #121313;
        }

        .btn-home {
            background-color: #121213;
            color: white;
            border-radius: 30px;
            padding: 10px 25px;
        }

        .btn-home:hover {
            background-color: #424346;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>

    <div class="thank-card">
        <div class="thank-icon mb-3">
            ✅
        </div>
        <h2 class="fw-bold text-dark">Thank You </h2>
        <p class="text-muted mt-3">
            Your feedback has been successfully submitted.
            We truly appreciate your time and effort.
        </p>
        <a href="../" class="btn btn-dark mt-3">Back to Home</a>
    </div>

</body>
</html>

<?php include '../nave.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }
        .profile-card {
            border-radius: 15px;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid black;
        }
        .table th {
            width: 30%;
        }
    </style>
</head>

<body>

<!-- Header -->
<div class=" text-dark text-center py-5 mt-5 shadow">
    <h2>My Profile</h2>
</div>

<div class="container my-5">
    <div class="row g-4">

        <!-- Left Profile Section -->
        <div class="col-lg-4">
            <div class="card profile-card shadow text-center p-4">
                
                <img src="../imagis/c1.jpg"  class="profile-img mx-auto mb-5">
                
                <h4 class="mt-2">Abhy Vekriya</h4>
                <p class="text-dark mb-1">Student at R.K College</p>
                <p><strong>Bio:</strong> Life is a game 🎮</p>

                <label for="fileUpload" class="btn btn-dark mt-2">
                    Edit Profile
                </label>
                <input type="file" id="fileUpload" class="d-none">

            </div>
        </div>

        <!-- Right Details Section -->
        <div class="col-lg-8">
            <div class="card profile-card shadow p-4">
                <h4 class="mb-4 text-dark">Profile Details</h4>

                <table class="table table-hover align-middle">
                    <tr>
                        <th>User ID</th>
                        <td>Mr.Abhi</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>Abhi Patel</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>apatel@example.com</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>+91 1234567890</td>
                    </tr>
                    <tr>
                        <th>Birth Date</th>
                        <td>04/04/2007</td>
                    </tr>
                    <tr>
                        <th>Interest</th>
                        <td>Civil Engineering</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>1, Gurudev, Kuvadva Road, Rajkot</td>
                    </tr>
                    <tr>
                        <th>My Purchases</th>
                        <td>4</td>
                    </tr>
                    <tr>
                        <th>Downloads</th>
                        <td>10</td>
                    </tr>
                </table>

            </div>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php include '../footer.php'; ?>

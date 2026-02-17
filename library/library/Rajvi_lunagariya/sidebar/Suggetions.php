<?php include '../nave.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suggestion Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        
        .card {
            border: none;
            border-radius: 15px;
        }
        .card-header {
            background-color: #fff;
            border-bottom: none;
            text-align: center;
            font-weight: bold;
            font-size: 22px;
        
        }
        
    </style>
</head>

<body>

<div class="container my-5 mt-5" style="height: 510px;">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 col-lg-5 mt-5">
            <div class="card shadow-lg">
                
                <div class="card-header">
                    <i class="bi bi-chat-dots-fill text-primary"></i> Submit a Suggestion
                </div>

                <div class="card-body p-4">

                    <form id="suggestionForm">
                        
                        <div class="mb-3">
                            <label class="form-label">Your Name</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" class="form-control" id="username" placeholder="Enter your name" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                                <input type="email" class="form-control" id="useremail" placeholder="Enter your email" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Your Suggestion</label>
                            <textarea class="form-control" id="suggestion" rows="4" placeholder="Write your suggestion here..." required></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="button" onclick="submitSuggestion()" class="btn btn-dark">
                                <i class="bi bi-send-fill"></i> Submit Suggestion
                            </button>
                        </div>

                        <div id="response" class="mt-3"></div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
function submitSuggestion() {
    const name = document.getElementById('username').value;
    const email = document.getElementById('useremail').value;
    const suggestion = document.getElementById('suggestion').value;
    const responseDiv = document.getElementById('response');

    if(name && email && suggestion) {

        responseDiv.innerHTML = `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Thank you! Your suggestion has been sent successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;

        document.getElementById('suggestionForm').reset();

    } else {
        responseDiv.innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Please fill out all fields.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php include '../footer.php'; ?>

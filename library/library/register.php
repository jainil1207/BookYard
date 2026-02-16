<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advanced Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
       
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrape@5.3.0/dist/js/bootstrape.bundle.min.js"></script> -->
    <script src="../library/jquery.js"></script>
    <script src="../library/validate.js"></script>

    <style>
        body {
            min-height: 100vh;
        }
        .register-card {
            border-radius: 15px;
        }
    </style>
</head>
<body>
 
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card register-card shadow-lg p-4">

                <div class="text-center mb-4">
                    <h2 class="fw-bold">User Registration</h2>
                    <p class="text-muted">Please fill in all required details</p>
                </div>

                <form novalidate  method="get" id="regform">

                    <!-- Personal Information -->
                    <h5 class="mb-3">Personal Information</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                             <label for="firstName" class="form-label fw-semibold">First Name</label>
                                <input type="text" class="form-control  " id="firstName" name="firstName" data-validation="required min alphabetic" data-min="2">
                                <span id="firstName_error" class="text-danger"> </span>              
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" data-validation="required min alphabetic" data-min="3">
                            <!-- <div id="Last_name_Error" class="invalid-feedback d-block"></div> -->
                            <span id="lastname_error" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" data-validation="required email">
                            <!-- <div class="invalid-feedback">Enter a valid email.</div> -->
                            <span id="email_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" name="phone" data-validation="required number" data-min="10" data-max="10">
                            <!-- <div class="invalid-feedback">Enter 10-digit phone number.</div> -->
                            <span id="phone_error" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" data-validation="required" name="dob" data-min="18" data-max="100">
                        <span id="dob_error" class="text-danger"></span>
                        <!-- <div class="invalid-feedback">Date of birth is required.</div> -->
                    </div>

                    <!-- Gender -->
                    <div class="mb-3">
                        <label class="form-label d-block">Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" data-validation="required gender" data-val="male" value="male">
                            <label class="form-check-label">Male</label>
                            <span class="text-danger" id="gender_error"></span>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" data-validation="required gender" data-val="female" value="female">
                            <label class="form-check-label">Female</label>
                            <span class="text-danger" id="gender_error"></span>
                        </div>
                        <!-- <div class="invalid-feedback d-block">Please select gender.</div> -->
                    </div>

                    <!-- Address -->
                    <h5 class="mt-4 mb-3">Address</h5>
                    <div class="mb-3">
                        <label class="form-label">Street Address</label>
                        <input type="text" class="form-control" data-validation="required" name="address" data-min="5" data-max="100"> 
                        <span id="address_error" class="text-danger"></span>
                        <!-- <div class="invalid-feedback">Address is required.</div> -->
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" data-validation="required" name="city" data-min="3" data-max="50">
                            <span id="city_error" class="text-danger"></span>
                            <!-- <div class="invalid-feedback">City is required.</div> -->
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">State</label>
                            <input type="text" class="form-control" data-validation="required" name="state" data-min="2" data-max="50">
                            <span id="state_error" class="text-danger"></span>
                            <!-- <div class="invalid-feedback">State is required.</div> -->
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Zip</label>
                            <input type="text" class="form-control" data-validation="required" name="zip" data-min="5" data-max="10">
                            <span id="zip_error" class="text-danger"></span>
                            <!-- <div class="invalid-feedback">Zip is required.</div> -->
                        </div>
                    </div>

                    <!-- Account Security -->
                    <h5 class="mt-4 mb-3">Account Security</h5>
                    <div class="mb-3">
                        <label for="confirmPassword_confirm" class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control" id="confirmPassword_confirm" name="password" placeholder="Create a strong password" data-validation="required strongPassword">
                            <span id="password_error"></span>
                    </div>

                    <div class="mb-3">
                       <label for="password" class="form-label fw-semibold">Confirm Password</label>
                            <input type="password" class="form-control  " id="password" name="confirmPassword" placeholder="Re-enter your password" data-validation="required confirmPassword">
                            <span id="confirmPassword_error"></span>
                    </div>

                    <!-- Terms -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" data-validation="required" name="terms" id="terms">
                        <label class="form-check-label" for="terms">
                            I agree to the Terms & Conditions
                        </label>
                        <span id="terms_error"></span>
                    </div>

                    <!-- Submit -->
                    <div class="d-grid">
                        <button class="btn btn-dark" type="submit">Register</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->

<!-- Validation Script -->
<!-- <script>
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script> -->

</body>
</html>
<?php include 'footer.php'; ?>

<?php
function validateFormData($data) {
    $errors = [];
    
    // Validate name
    if (empty($data['name'])) {
        $errors['name'] = "Name is required";
    } elseif (strlen($data['name']) < 3) {
        $errors['name'] = "Name must be at least 3 characters long";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $data['name'])) {
        $errors['name'] = "Only letters and white space allowed in name";
    }
    
    // Validate email
    if (empty($data['email'])) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }
    
    // Validate address
    if (empty($data['address'])) {
        $errors['address'] = "Address is required";
    } elseif (strlen($data['address']) < 10) {
        $errors['address'] = "Address must be at least 10 characters long";
    }
    
    // Validate payment method
    if (empty($data['payment'])) {
        $errors['payment'] = "Please select a payment method";
    }
    
    return $errors;
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
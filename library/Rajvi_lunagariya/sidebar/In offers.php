<?php include '../nave.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Offers Book</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    padding: 50px;
  }

  .offers-book {
    background-color: #fff;
    padding: 25px;
    max-width: 400px;
    margin: auto;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center;
  }

  .offers-book input {
    width: 80%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
  }

  .offers-book button {
    padding: 10px 20px;
    background-color: #ff6600;
    color: #fff;
    border: none;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
  }

  .offers-book button:hover {
    background-color: #e65c00;
  }

  .message {
    margin-top: 15px;
    font-weight: bold;
  }

  .valid { color: green; }
  .invalid { color: red; }
</style>
</head>
<body>

<div class="offers-book">
  <h2>Enter Your Offer Code</h2>
  <input type="text" id="offerCode" placeholder="Enter code here">
  <br>
  <button onclick="checkOffer()">Check Offer</button>
  <div class="message" id="message"></div>
</div>

<script>
  // Example valid offer codes
  const validCodes = {
    "DISCOUNT10": "10% off on your order",
    "FREESHIP": "Free shipping on your purchase",
    "WELCOME5": "5% off for new customers"
  };

  function checkOffer() {
    const code = document.getElementById('offerCode').value.trim().toUpperCase();
    const messageDiv = document.getElementById('message');

    if (validCodes[code]) {
      messageDiv.textContent = `Valid Code! ${validCodes[code]}`;
      messageDiv.className = "message valid";
    } else {
      messageDiv.textContent = "Invalid Code. Please try again.";
      messageDiv.className = "message invalid";
    }
  }
</script>

</body>
</html>
<?php include '../footer.php'; ?>


<?php include '../nave.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Preferences Example</title>

  <!-- Google Fonts for nicer options -->

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Base styles */
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      justify-content: center;
    }

    h1 {
      font-size: 2.5rem;
      margin-bottom: 10px;
    }

    p {
      font-size: 1.2rem;
      margin-bottom: 30px;
    }

    .preferences {
      display: flex;
      flex-direction: column;
      gap: 20px;
      background: rgba(255, 255, 255, 0.9);
      padding: 30px 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      text-align: center;
      max-width: 400px;
      width: 90%;
    }

    /* Themes */
    .light-theme {
      background-color: #f5f5f5;
      color: #222;
    }

    .dark-theme {
      background-color: #121212;
      color: #f0f0f0;
    }

    /* Buttons */
    button {
      padding: 10px 20px;
      margin: 5px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .btn-light {
      background-color: #e0e0e0;
      color: #222;
    }

    .btn-light:hover {
      background-color: #d5d5d5;
    }

    .btn-dark {
      background-color: #333;
      color: #f0f0f0;
    }

    .btn-dark:hover {
      background-color: #444;
    }

    /* Select inputs */
    select {
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    select:focus {
      outline: none;
      border-color: #0d6efd;
      box-shadow: 0 0 5px rgba(13,110,253,0.5);
    }

    @media (max-width: 500px) {
      .preferences {
        padding: 20px;
      }

      h1 {
        font-size: 2rem;
      }

      p {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body class="light-theme">
  
  <div class="preferences">
    <h1>Customize Your Reading Experience</h1>
    <p>Set your preferences for theme, font size, and font family:</p>

    <!-- Theme Buttons -->
    <div>
      <button class="btn-light" onclick="setTheme('light')">Light Theme</button>
      <button class="btn-dark" onclick="setTheme('dark')">Dark Theme</button>
    </div>

    <!-- Font Size Selector -->
    <div>
      <label for="fontSize">Font Size:</label>
      <select id="fontSize" onchange="setFontSize(this.value)">
        <option value="16px">Small</option>
        <option value="20px">Medium</option>
        <option value="24px">Large</option>
      </select>
    </div>

    <!-- Font Family Selector -->
    <div>
      <label for="fontFamily">Font Family:</label>
      <select id="fontFamily" onchange="setFontFamily(this.value)">
        <option value="Arial, sans-serif">Arial</option>
        <option value="'Times New Roman', serif">Times New Roman</option>
        <option value="'Courier New', monospace">Courier New</option>
        <option value="Georgia, serif">Georgia</option>
      </select>
    </div>
  </div>

  <script>
    // --- Theme ---
    function setTheme(theme) {
      document.body.className = theme + '-theme';
      localStorage.setItem('themePreference', theme);
    }

    // --- Font Size ---
    function setFontSize(size) {
      document.body.style.fontSize = size;
      localStorage.setItem('fontSizePreference', size);
    }

    // --- Font Family ---
    function setFontFamily(family) {
      document.body.style.fontFamily = family;
      localStorage.setItem('fontFamilyPreference', family);
    }

    // --- Load saved preferences ---
    window.onload = function() {
      // Theme
      const savedTheme = localStorage.getItem('themePreference');
      if (savedTheme) {
        document.body.className = savedTheme + '-theme';
      }

      // Font Size
      const savedSize = localStorage.getItem('fontSizePreference');
      if (savedSize) {
        document.body.style.fontSize = savedSize;
        document.getElementById('fontSize').value = savedSize;
      }

      // Font Family
      const savedFamily = localStorage.getItem('fontFamilyPreference');
      if (savedFamily) {
        document.body.style.fontFamily = savedFamily;
        document.getElementById('fontFamily').value = savedFamily;
      }
    };
  </script>
</body>
</html>
<?php include '../footer.php'; ?>


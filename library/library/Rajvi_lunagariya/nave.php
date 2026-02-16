<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style> /* Hide checkbox */
#menu-toggle-checkbox{
    display:none;
}

/* Menu Button */
.menu-btn{
    top:5px;
    left:5px;
    font-size:20px;
    cursor:pointer;
    z-index:1100;
    border-radius:5px;
}

/* Sidebar */
#sidebar{
    position:fixed;
    top:0;
    left:-260px;
    width:260px;
    height:100%;
    background:#212529 border-box;
    padding-top:0px;
    transition:all 0.3s ease;
    z-index:999;
}

/* When checkbox checked → show sidebar */
#menu-toggle-checkbox:checked ~ #sidebar{
    left:0;
}

/* Sidebar Design */
#sidebar .title{
    color:#fff;
    text-align:center;
    padding:0px;
    top: 0;
    font-size:18px;
    background:#212529;
    border: #343a40;
}

#sidebar ul{
    list-style:none;
    padding:0;
}

#sidebar ul li{
    padding:15px 20px;
}

#sidebar ul li a{
    color:#fff;
    text-decoration:none;
    display:block;
}

#sidebar ul li:hover{
    background:#343a40;
}


</style>
</head>
<body>
    <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top border-bottom shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">📚 My Online Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
       <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="../nav/profile.php">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="../nav/About.php">About us</a></li>
            <li class="nav-item"><a class="nav-link" href="../nav/Preference.php">Peference</a></li>
            <li class="nav-item"><a class="nav-link" href="../nav/feedback.php">Feed back</a></li>
 <input type="checkbox" id="menu-toggle-checkbox">

<label for="menu-toggle-checkbox" class="menu-btn text-white bg-dark p-2 position-fixed border rounded">
    ☰
</label>

<div id="sidebar">
    <div class="title mt-3">📚 Side Menu</div>
    <ul>
        <li><a href="../sidebar/Categories.php">Categories</a></li>
        <li><a href="../sidebar/Digital Resources.php">Digital Resources</a></li>
        <li><a href="../sidebar/price.php">Price</a></li>
        <li><a href="../sidebar/Suggetions.php">Suggestion</a></li>
        <li><a href="../sidebar/My books.php">My Library</a></li>
        <li><a href="../sidebar/Tutorial.php">Tutorials</a></li>
        <li><a href="../sidebar/Downloads.php">Shoping</a></li>
    </ul>
</div>
  

   

  
</nav>
    
</body>
</html>
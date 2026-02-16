<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pettenn Online Library</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 

    <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Navbar */
.navbar {
    display: flex;
    justify-content: space-between;
    padding: 15px 40px;
    background: rgba(0,0,0,0.7);
    position: fixed;
    width:100%;
    padding: auto;
    color: white;
}

.navbar nav a {
    color: white;
    margin: 0 10px;
    text-decoration: none;
}

.a1 {
    cursor: pointer;
}

.btn {
    background: #e67e22;
    border: none;
    padding: 8px 14px;
    color: white;
    cursor: pointer;
    border-radius: 5px;
}
.body{
    background-image: url("pexels-rickyrecap-1907784.jpg") ;
    background-size: cover;
    background-position: center;    }

/* Hero */
.hero {
    background-image: url("pexels-rickyrecap-1907784.jpg") ;
    height: 420px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
    background: rgba(0,0,0,0.3);
}

.hero-content h1 {
    font-size: 32px;
}

.hero-content h2 {
    font-size: 46px;
    margin: 10px 0;
}

.search-box {
    margin-top: 20px;
}

.search-box input {
    padding: 12px;
    width: 320px;
    border-radius: 5px 0 0 5px;
    border: none;
}

.search-box button {
    padding: 12px 18px;
    border: none;
    background: #e67e22;
    color: white;
    border-radius: 0 5px 5px 0;
}

/* Features */
.features {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin: 40px;
}

.card {
    background: rgba(0,0,0,0.7);
    color: white;
    padding: 20px;
    width: 220px;
    border-radius: 10px;
    text-align: center;
}

/* Popular */
.popular {
    display: flex;
    justify-content: space-around;
    margin: 40px;
}

.popular-left, .popular-right {
    background:rgba(243, 238, 238, 0.7);
    color: black;
    padding: 20px;
    width: 45%;
    border-radius: 10px;
}

.books {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}

.book {
    width: 80px;
    height: 110px;
    background: rgba(0,0,0,0.7);
    border-radius: 5px;
}

.popular-right ul {
    margin: 15px 0;
}

.popular-right li {
    margin-bottom: 8px;
}

</style>
</head>
<body>
    <form action="login.php" method="post">
       

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Welcome To</h1>
        <h2>Book Yard</h2>
        <p>Explore a World of Books & Knowledge</p>

        <div class="search-box">
            <input type="text" placeholder="Search for books, authors, or genres...">
            <button>Search</button>
        </div>
    </div>
</section>

<!-- Features -->
<section class="features">
    <div class="card">
        <h3>📘 Read Ebooks</h3>
        <p>Discover thousands of digital books</p>
    </div>
    <div class="card">
        <h3>🎧 Audiobooks</h3>
        <p>Enjoy stories on the go</p>
    </div>
    <div class="card">
        <h3>🆕 New Arrivals</h3>
        <p>Explore the latest releases</p>
    </div>
</section>

<!-- Popular Section -->
<section class="popular">
    <div class="popular-left">
        <h2>Popular This Week</h2>
        <p>See what's trending now</p>

        <div class="books">
            <div class="book"></div>
            <div class="book"></div>
            <div class="book"></div>
            <div class="book"></div>
        </div>
    </div>

    <div class="popular-right">
        <h2>Join Pettenn Today!</h2>
        <ul>
            <li>Thousands of Titles</li>
            <li>Anytime, Anywhere</li>
            <li>Start Your Free Trial</li>
        </ul>
        <button class="btn btn-dark text-white" href='register.php'>Get Started</button>
    </div>
</section>
    </form>
</body>
</html>
<?php include 'footer.php'; ?>

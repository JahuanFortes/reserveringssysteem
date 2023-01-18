<?php
//May I even visit this page?
if (!isset($_SESSION['loggedInUser'])) {
    header("Location: home.php");

}

//Get email from session
$name = $_SESSION['loggedInUser']['name'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database Customers</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header">
    <h1>Home</h1>
</header>

<nav class="navbar">
    <ul class="nav-position">
        <li><a class="navlink" href="home.php">Home</a></li>
        <li><a class="navlink" href="products.php">Products</a></li>
        <li><a class="navlink" href="about-me.php">About me</a></li>
        <li><a class="navlink" href="contact.php">Contact</a></li>
        <li><a class="navlink" href="overview.php">Overzicht</a></li>
        <li><a class="navlink" href="register.php">link</a> </li>
        <li><a class="navlink" href="login.php">link</a></li>
    </ul>
</nav>

<main>
    <section>
        <div>

        </div>
    </section>

    <section>

    </section>
</main>
</body>
</html>


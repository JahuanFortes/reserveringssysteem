<?php
session_start();
/**@var $db */
require_once "connect_db.php";

$customer_id = $_GET['customer_id'];
if (isset($_POST['submit'])) {
    $customer_id = $_POST['customer_id'];
    $furniture_of_choice = $_POST['furniture_of_choice'];
    $color = $_POST['color'];
    $quantity = $_POST['quantity'];

    $errors = [];
    if ($quantity == '') {
        $errors['quantity'] = 'Dit is een required field';
    }
    if ($color == '') {
        $errors['color'] = 'Dit is een required field';
    }
    if (empty($errors)) {
        $query = "INSERT INTO orders (customer_id,furniture_of_choice,quantity,color)
                  VALUES('$customer_id','$furniture_of_choice','$quantity','$color')";
        $clients = $db->query($query) or die($db->error);
        header("Location: home.php");
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>orders</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header class="header">
            <h1>Orders</h1>
            <a class="navlink" href="logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>
            </a>
        </header>
        <nav class="navbar">
            <ul class="nav-position">
                <li><a class="navlink" href="home.php">Home</a></li>
                <li><a class="navlink" href="products.php">Products</a></li>
                <li><a class="navlink" href="about-me.php">About me</a></li>
                <li><a class="navlink" href="contact.php">Contact</a></li>
                <li><a class="navlink" href="overview.php">Overzicht</a></li>
                <li><a class="navlink" href="register.php">Register</a> </li>
                <li><a class="navlink" href="index.php">Login</a></li>
            </ul>
        </nav>
        <main>
            <form action="" method="post" name="form">
                <div class="container">
                    <div class="form">
                        <label for="color">
                            <input type="text" name="color" autocomplete="off" placeholder="Kleur" required>
                            <?=$errors?>
                        </label>
                    </div>

                    <div class="form">
                        <label for="quantity">
                            <input type="text" name="quantity" autocomplete="off" placeholder="Hoeveelheid" required>
                            <?=$errors?>
                        </label>
                    </div>
                    <select name="furniture_of_choice">
                        <option value="kast">Kast</option>
                        <option value="stoel">Stoel</option>
                        <option value="tafel">Tafel</option>
                    </select>
                    <div class="form">
                        <input type="submit" name="submit" value="submit">
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>

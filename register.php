<?php
session_start();
require_once "connect_db.php";
/**@var $db */

if (isset($_POST['submit'])) {

    $firstname = $_POST ['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $streetname = $_POST['streetname'];
    $postalcode = $_POST['postalcode'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];


    $errors = [];
    if ($firstname == '') {
        $errors['firstname'] = 'Dit is een required field';
    }
    if ($lastname == '') {
        $errors['lastname'] = 'Dit is een required field';
    }
    if ($email == '') {
        $errors['email'] = 'Dit is een required field';
    }
    if ($address == '') {
        $errors['address'] = 'Dit is een required field';
    }
    if ($streetname == '') {
        $errors['streetname'] = 'Dit is een required field';
    }
    if ($postalcode == '') {
        $errors['postalcode'] = 'Dit is een required field';
    }
    if ($phone_number == '') {
        $errors['phone_number'] = 'Dit is een required field';
    }
    if ($password == '') {
        $errors['password'] = 'Dit is een required field';
    }
    if (empty($errors)) {
        $query = "INSERT INTO customers (firstname,lastname,email,address,streetname,postalcode,phone_number,password)
                  VALUES('$firstname','$lastname','$email','$address','$streetname','$postalcode','$phone_number','$password')";
        $clients = $db->query($query) or die($db->error);
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
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header class="header">
            <h1>Database Customers</h1>
        </header>
        <nav class="navbar">
            <ul class="nav-position">
                <li><a class="navlink" href="#">Home</a></li>
                <li><a class="navlink" href="#">Products</a></li>
                <li><a class="navlink" href="#">About me</a></li>
                <li><a class="navlink" href="#">Contact</a></li>
            </ul>
        </nav>
        <a href="index.php">Terug</a>
        <br><br>
        <main>
            <form action="" method="post" name="form">
                <div class="container">
                    <div class="form">
                        <label for="firstname">
                            <input type="text" name="firstname"autocomplete="off" placeholder="Voornaam" required>
                        </label>
                    </div>
                    <div class="form">
                        <label for="lastname">
                            <input type="text" name="lastname" autocomplete="off" placeholder="Achternaam" required>
                        </label>
                    </div>
                    <div class="form">
                        <label for="email">
                            <input type="text" name="email" autocomplete="off" placeholder="E-mail" required>
                        </label>
                    </div>
                    <div class="form">
                        <label for="address">
                            <input type="text" name="address" autocomplete="off" placeholder="Woonplaats" required>
                        </label>
                    </div>
                    <div class="form">
                        <label for="streetname">
                            <input type="text" name="streetname" autocomplete="off" placeholder="Straatnaam" required>
                        </label>
                    </div>
                    <div class="form">
                        <label for="postalcode">
                            <input type="text" name="postalcode" autocomplete="off" placeholder="Postcode" required>
                        </label>
                    </div>
                    <div class="form">
                        <label for="phone_number">
                            <input type="text" name="phone_number" autocomplete="off" placeholder="Telefoon_nummer" required>
                        </label>
                    </div>
                    <div class="form">
                        <label for="password">
                            <input type="text" name="password" autocomplete="off" placeholder="Wachtwoord" required>
                        </label>
                    </div>
                    <div class="form">
                        <input type="submit" name="submit" value="submit">
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>

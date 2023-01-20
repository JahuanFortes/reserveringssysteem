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

    $errors=[];
    if ($firstname == "") {
        $errors['firstname'] = 'Dit is een requierd field';
    }
    if ($lastname == "") {
        $errors['lastname'] = 'Dit is een requierd field';
    }
    if ($email == "") {
        $errors['email'] = 'Dit is een requierd field';
    }
    if ($address == "") {
        $errors['address'] = 'Dit is een requierd field';
    }
    if ($streetname == "") {
        $errors['streetname'] = 'Dit is een requierd field';
    }
    if ($postalcode == "") {
        $errors['postalcode'] = 'Dit is een requierd field';
    }
    if ($phone_number == "") {
        $errors['phone_number'] = 'Dit is een requierd field';
    }
    if ($password == "") {
        $errors['password'] = 'Dit is een requierd field';
    }
    if (empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO customers (firstname,lastname,email,address,streetname,postalcode,phone_number,password)
                  VALUES('$firstname','$lastname','$email','$address','$streetname','$postalcode','$phone_number','$password')";
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
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <div class="header">
                <h1>Register</h1>
            </div>
            <div class="account">

            </div>
        </header>
        <a href="home.php">Terug</a>
        <br><br>
        <main>
            <form action="" method="post" name="form">
                <div class="container">
                    <div class="form">
                        <div>
                            <label for="firstname">
                                <input type="text" id="firstname" name="firstname"autocomplete="off" placeholder="Voornaam" >
                            </label>
                            <p>
                                <?= $errors['firstname'] ?? ''?>
                            </p>
                        </div>
                    </div>
                    <div class="form">
                        <div>
                            <label for="lastname">
                                <input type="text" name="lastname"  autocomplete="off" placeholder="Achternaam" >
                            </label>
                            <p>
                                <?= $errors['lastname'] ?? ''?>
                            </p>
                        </div>
                    </div>
                    <div class="form">
                        <div>
                            <label for="email">
                                <input type="text" name="email" autocomplete="off" placeholder="E-mail" >
                            </label>
                            <p>
                                <?= $errors['email'] ?? ''?>
                            </p>
                        </div>
                    </div>
                    <div class="form">
                        <div>
                            <label for="address">
                                <input type="text" name="address" autocomplete="off" placeholder="Woonplaats" >
                            </label>
                        </div>
                        <p>
                            <?= $errors['address'] ?? ''?>
                        </p>
                    </div>
                    <div class="form">
                        <div>
                            <label for="streetname">
                                <input type="text" name="streetname"  autocomplete="off" placeholder="Straatnaam" >
                            </label>
                            <p>
                                <?= $errors['streetname'] ?? ''?>
                            </p>
                        </div>
                    </div>
                    <div class="form">
                        <label for="postalcode">
                            <input type="text" name="postalcode"  autocomplete="off" placeholder="Postcode" >
                        </label>
                        <p>
                            <?= $errors['postalcode'] ?? ''?>
                        </p>
                    </div>
                    <div>
                        <div class="form">
                            <label for="phone_number">
                                <input type="text" name="phone_number"  autocomplete="off" placeholder="Telefoon_nummer" >
                            </label>
                        </div>
                        <p>
                            <?= $errors['phone_number'] ?? ''?>
                        </p>
                    </div>
                    <div class="form">
                        <label for="password">
                            <input type="password" name="password"  autocomplete="off" placeholder="Wachtwoord"  >
                        </label>
                        <p>
                            <?= $errors['password'] ?? ''?>
                        </p>
                    </div>
                    <div class="form">
                        <input type="submit" name="submit" value="submit">
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>

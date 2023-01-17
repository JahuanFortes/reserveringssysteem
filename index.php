<?php
session_start();
//Multidimensional array with the music collection data
/**@var $db*/
    require_once "connect_db.php";
    $clients = $db ->query("SELECT * FROM customers ORDER BY customer_id ASC");
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
        <h1>Database Customers</h1>
    </header>

    <nav class="navbar">
        <ul class="nav-position">
            <li><a class="navlink" href="index.php">Home</a></li>
            <li><a class="navlink" href="products.php">Products</a></li>
            <li><a class="navlink" href="#">About me</a></li>
            <li><a class="navlink" href="#">Contact</a></li>
            <li><a class="navlink" href="register.php">link</a> </li>
            <li><a class="navlink" href="login.php">link</a> </li>

        </ul>
    </nav>
        <main>
            <table class="table">
                <thead>
                <tr class="name-space">
                    <th>ID</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Mail</th>
                    <th>Woonplaats</th>
                    <th>Postcode</th>
                    <th>Straatnaam</th>
                    <th>Telefoonnummer</th>
                    <th>Wachtwoord</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($clients as $client => $customer){?>
                    <tr>
                        <td><?= $customer ['customer_id'] ?></td>
                        <td><?= $customer['firstname'] ?></td>
                        <td><?= $customer['lastname'] ?></td>
                        <td><?= $customer['email'] ?></td>
                        <td><?= $customer['address'] ?></td>
                        <td><?= $customer['streetname'] ?></td>
                        <td><?= $customer['postalcode'] ?></td>
                        <td><?= $customer['phone_number'] ?></td>
                        <td><?= $customer['password'] ?></td>
                        <td><a href= "update.php?customer_id=<?= $customer ['customer_id'] ?>"> update</a></td>
                        <td><a href= "delete.php?customer_id=<?= $customer ['customer_id'] ?>"> delete</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </main>
    </body>
</html>

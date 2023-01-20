<?php
session_start();
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
            <table class="table">
                <thead>
                <tr class="name-space">
                    <th>ID</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Mail</th>
                    <th>Woonplaats</th>
                    <th>Straatnaam</th>
                    <th>Postcode</th>
                    <th>Telefoonnummer</th>
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
                        <td><a href= "update.php?customer_id=<?= $customer ['customer_id'] ?>"> update</a></td>
                        <td><a href= "delete.php?customer_id=<?= $customer ['customer_id'] ?>"> delete</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </main>
    </body>
</html>

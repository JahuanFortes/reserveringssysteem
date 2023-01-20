<?php
session_start();
require_once 'connect_db.php';
/**@var $db*/

$id = $_GET['customer_id'];

if (isset($_POST['submit'])) {
    $password = $_POST['password'];

    if ($password == "") {
        $errors['password'] = 'Dit is een requierd field';
    }
    if (empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE customers 
                  SET password = ('$password')
                  WHERE customer_id ='$id'";
        $clients = $db->query($query) or die($db->error);
        header("Location: home.php");
    }

}
mysqli_escape_string($db, $_GET['customer_id']);
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
        <h1>Update</h1>
        <div>
            <a class="navlink" href="logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>
            </a>
        </div>
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

<a href="overview.php">Terug</a>
<br><br>

<form action="" method="post" name="form">
    <table>

        <tr>
            <td>Wachtwoord</td>
            <td><input type="password" name="password" autocomplete="off" ></td>
            <p>
                <?= $errors['password'] ?? ''?>
            </p>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Add"></td>
        </tr>
    </table>

</form>

</body>
</html>

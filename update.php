<?php
require_once 'connect_db.php';
/**@var $db*/

// Get user data from database based on id
$id = $_GET['customer_id'];

if (isset($_POST['submit'])) {
    $password = $_POST['password'];

    if (empty($errors)) {
        // UPDATE password
        $query = "UPDATE customers 
                  SET password = ('$password')
                  WHERE customer_id ='$id'";
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
</head>
<body>

<nav class="nav">
    <ul>
        <li>Home</li>
        <li>About me</li>
        <li>Products</li>
        <li>Contact</li>
    </ul>
</nav>
<a href="index.php">Terug</a>
<br><br>

<form action="" method="post" name="form">
    <table>

        <tr>
            <td>Wachtwoord</td>
            <td><input type="text" name="password" autocomplete="off" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Add"></td>
        </tr>
    </table>

</form>

</body>
</html>

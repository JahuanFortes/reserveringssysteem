<?php
session_start();
/**@var $db*/

$login = false;
// Is user logged in?
if (isset($_SESSION['loggedInUser'])) {
    $login = true;
}

if (isset($_POST['submit'])) {
    require_once "connect_db.php";

    // Get form data
    $email = mysqli_escape_string($db, $_POST['email']);
    $password =htmlentities($_POST['password']) ;

    // Server-side validation
    $errors = [];
    if ($email == '') {
        $errors['email'] = 'Please fill in your email.';
    }
    if ($password == '') {
        $errors['password'] = 'Please fill in your password.';
    }

    // If data valid
    if (empty($errors)) {
        // SELECT the user from the database, based on the email address.
        $query = "SELECT * FROM customers WHERE email='$email'";
        $result = mysqli_query($db, $query);

        // check if the user exists
        if (mysqli_num_rows($result) == 1) {
            // Get user data from result
            $customer = mysqli_fetch_assoc($result);

            // Check if the provided password matches the stored password in the database
            if (password_verify($password, $customer['password'])) {
                $login = true;

                // Store the user in the session
                $_SESSION['loggedInUser'] = [
                    'customer_id'    => $customer['customer_id'],
                    'firstname'  => $customer['firstname'],
                    'email' => $customer['email'],
                ];

                // Redirect to secure page
            } else {
                //error incorrect log in
                $errors['loginFailed'] = 'The provided credentials do not match.';
            }
        } else {
            //error incorrect log in
            $errors['loginFailed'] = 'The provided credentials do not match.';
        }
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

<header class="header">
    <h1>Database Customers</h1>
</header>

<nav class="nav">
    <ul>
        <li>Home</li>
        <li>About me</li>
        <li>Products</li>
        <li>Contact</li>
        <li><a href="register.php">link</a> </li>
    </ul>
</nav>
<hr/>
<form action="" method="post" name="form">
    <div class="form">
        <label for="email">
            <input type="text" name="email" autocomplete="off" placeholder="E-mail" required>
        </label>
    </div>
    <div>
        <label for="password">
            <input type="text" name="password" autocomplete="off" placeholder="Wachtwoord" required>
        </label>
    </div>
    <div class="form">
        <input type="submit" name="submit" value="submit">
    </div>
</form>

</body>
</html>

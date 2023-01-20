<?php
session_start();
/**@var $db*/

$login = false;
if (isset($_SESSION['loggedInUser'])) {
    $login = true;
}

if (isset($_POST['submit'])) {
    require_once "connect_db.php";

    $email = mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];
    $errors = [];
    if ($email == '') {
        $errors['email'] = 'Please fill in your email.';
    }
    if ($password == '') {
        $errors['password'] = 'Please fill in your password.';
    }
    if (empty($errors)) {
        $query = "SELECT * FROM customers WHERE email='$email'";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) == 1) {
            $customer = mysqli_fetch_assoc($result);

            if (password_verify($password, $customer['password'])) {
                $login = true;
                $_SESSION['loggedInUser'] = [
                    'customer_id'    => $customer['customer_id'],
                    'firstname'  => $customer['firstname'],
                    'email' => $customer['email'],
                ];
                header("Location: home.php");

            } else {
                $errors['loginFailed'] = 'The provided credentials do not match.';
            }

        } else {
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
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <div class="header">
                <h1>Login</h1>
            </div>
        </header>
        <main class="login-card">
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
            <a href="register.php">Sign-up</a>
        </main>
    </body>
</html>

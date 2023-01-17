<?php
session_start();
if(!isset($_SESSION['loggedInUser'])){
    header("Location: login.php");
    exit;
}
$firstname = $_SESSION['loggedInUser']['firstname'];
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
        <section class="section">
            <div class="container content">

                <article class="message is-warning">
                    <div>
                        <p>Lorem.</p>
                    </div>
                    <div>
                        <div>
                            <h2>
                                Welcome, <?= $firstname ?>
                            </h2>
                            <a href="logout.php">Log out</a>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    </body>
</html>

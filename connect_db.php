<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'admin_overview';

$db = mysqli_connect($host, $username, $password, $database)
    or die('Error: '.mysqli_connect_error());

//$query = "SELECT * FROM customers";
//
//$result = mysqli_query($db,$query)
//    or die('Error '.mysqli_error($db).'with query'.$query);
//
//$klant = [];
//
//while ($row = mysqli_fetch_assoc($result)){
//    $klant[] = $row;
//}

?>

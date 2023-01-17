<?php
require_once 'connect_db.php';
/**@var $db*/

$customer_id = $_GET['customer_id'];

$query = "DELETE FROM customers WHERE customer_id = '$customer_id'";
$customer = $db->query($query) or die($db->error);


header("Location:index.php");


?>
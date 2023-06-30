<?php
// sesson start
session_start();
//constants
//define('SITEURL', 'http://localhost/FOOD/');
define('SITEURL', 'http://localhost/FOOD/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food_delivery_system');

//$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
//$db_select = mysqli_select_db( $conn, DB_NAME) or die(mysqli_error());//selecting data base
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn));
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));//selecting database
?>




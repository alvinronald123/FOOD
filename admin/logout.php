<?php
session_start();
include('../config/constant.php');

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['user'])) {
    $_SESSION['no-login-message'] = "Please login to access the page";
    header('location:' . SITEURL . 'admin/login.php');
    exit;
}
?>
<?php
//incude constant.php
include('../config/constant.php');
//delete session
//destroy session
session_destroy();//unset $_SESSION['user']

//redirect to LOGIN
header('location:'.SITEURL.'admin/login.php');


?>
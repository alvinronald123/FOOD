<?php
// Check if user is logged in
if (!isset($_SESSION['user'])) {
  // If user is not logged in, redirect to login page
  $_SESSION['no-login-message'] = "Please login. Thanks!";
  // Redirect to login page
  header('location: ' . SITEURL . 'admin/login.php');
  exit; // Make sure to exit after redirecting
}
?>

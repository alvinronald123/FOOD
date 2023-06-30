
<?php include('../config/constant.php');

// Check if the user is already logged in, redirect to the admin panel if true
if (isset($_SESSION['user'])) {
    header('location:' . SITEURL . 'admin/');
    exit;
}

// Check if the login form is submitted
if (isset($_POST['submit'])) {
    // Process the login
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Check if the user exists in the database
    $sql = "SELECT * FROM tb_admin WHERE username = '$username' AND password='$password'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        // User found, login successful
        $_SESSION['user'] = $username;
        header('location:' . SITEURL . 'admin/');
        exit;
    } else {
        // User not found, login failed
        $_SESSION['login'] = "LOGIN FAILED";
        header('location:' . SITEURL . 'admin/login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Login</title>
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
        <br><br>
        <!-- login form-->
        <form action="" method="POST">
            <label>Username</label>
            <br><br>
            <input type="text" name="username" placeholder="Enter Username" class="logform">
            <br><br>
            <label>Password</label>
            <br><br>
            <input type="password" name="password" placeholder="Enter Password" class="logform">
            <br><br>
            <input type="submit" name="submit" value="Login" class="btn-primary logform">
            <br><br>
        </form>
        <p class="text-center"> <a href="www.google.com"> Group</a> </p>
    </div>
</body>
</html>
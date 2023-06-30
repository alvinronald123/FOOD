<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('partials/menu.php');?>
    <div class="main-content">
      <div class="wrapper">
        <h1> Add Admin </h1>
        <br>
        <?php
        if(isset($_SESSION['add'])) // checking if session is set
        {
          echo $_SESSION['add'];// display session mmessage
          unset($_SESSION['add']);// stoping session
        }


         ?>
        <form action="" method="POST" class="text-center">
          <table class="tbl-30">
            <tr>
              <td>Full Name:</td>

              <td> <input type="text" name="full_name" placeholder="Enter Your Name"></td>
            </tr>
                        <tr>
              <td>Username:</td>
              <br>
              <td> <input type="text" name="username" placeholder="Enter Your Username"></td>
            </tr>
            <tr>
              <td>Password:</td>
              <td> <input type="password" name="password" placeholder="Enter Your Password"></td>
            </tr>

          </table>
            <input type="submit" name="submit" value="Add Admin" class="btn-primary new">
        </form>
      </div>
    </div>

    <?php require_once ('partials/footer.php');?>

    <?php
// post the data in our data base for Admin
//check if on click is working
if(isset($_POST['submit'])){
    $full_name =$_POST['full_name'];
    $username=$_POST['username'];
    $password= (md5($_POST['password']));   // password encrypyion

    $sql = "INSERT INTO tb_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'
";
// data base connection

// save data in database
   $res = mysqli_query($conn, $sql) or die(mysqli_error());

//check sql res
   if($res==TRUE){
     //insert data
     //echo "data inserted";
     //session_variable
     $_SESSION['add'] ="Admin Added Successfully";
     //redirect ldap_control_paged_
     header("location:".SITEURL.'admin/manage-admin.php');
   }
   else{
     //failed to work
    // echo "data inserted failed";
    //session_variable
    $_SESSION['add'] =" Failed to Add Admin Successfully";
    //redirect add admin
    header("location:".SITEURL.'admin/manage-admin.php');
   }

}
    ?>













</body>
</html>

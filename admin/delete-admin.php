<?php
 // inclu constant.php
 include ('../config/constant.php');
//get the id of the admin to be deleted
     $id = $_GET['id'];

// creat sql query to be deleted
$sql = "DELETE FROM tb_admin WHERE Id=$id";
//run query
$res = mysqli_query($conn, $sql);

// check if the query wordked
if($res==TRUE)
{
  // run Successfully
  //echo "Admin Deleted";
//session to display message
$_SESSION['delete'] = "<div class='success'> Admin Delete Successfully <div>";
//Redirect
header('location:'.SITEURL.'admin/manage-admin.php');

}
else {
  //failed
  //echo "Failed to Delete Admin";
  $_SESSION['delete'] = "<div class='error'> Failed to Delete Admin </div>";
  //Redirect
  header('location:'.SITEURL.'admin/manage-admin.php');
}

//Redirect to manage admin page with message


 ?>

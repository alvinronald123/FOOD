<?php include('partials/menu.php');?>

<div class="main-content">
<div class="wrapper">
<h1> Update Admin </h1>
<br><br>

<?php
// get id of selcted admin
 $id = $_GET['id'];

//create sql query to get mine
$sql ="SELECT * FROM tb_admin WHERE Id = $id";
//execute the query
$res = mysqli_query($conn, $sql);
//check if the query is running
if($res==TRUE)
{
  //  check if the data is available
  $count = mysqli_num_rows($res);
  //check wether we have admin data or //
  if($count==1)
  {
    //get the details
    //echo "admin available";

    $row = mysqli_fetch_assoc($res);
    $full_name = $row['full_name'];
      $username = $row['username'];
  }
  else{
    // redirect to manage Admin
    header('location:'.SITEURL.'admin/manage-admin.php');
  }
}
 ?>
<form action="" method="POST">

  <table class="tbl-30">
    <tr>
      <td> Full Name </td>
      <td> <input type="text" name="full_name" value="<?php echo $full_name?>"> </td>
    </tr>
    <tr>
      <td> Username </td>
      <td> <input type="text" name="username" value="<?php echo $username?>"> </td>
    </tr>
    <br>
      <input type="hidden" name="id" value="<?php echo $id?>">
      <input type="submit" name="submit" value="Update Admin" class="btn-primary update">



  </table>
</form>
</div>
</div>
<?php
//check if the submit button is clicked or not
if(isset($_POST['submit']))
{
  //echo "button clicked";
  //get all values from form
    $id = $_POST['id'];
     $full_name = $_POST['full_name'];
   $username = $_POST['username'];
   //create sql HttpQueryString
   $sql = "UPDATE tb_admin SET
   full_name= '$full_name',
    username= '$username'
    WHERE Id = '$id'
   ";
   // run the HttpQueryString
   $res = mysqli_query($conn, $sql);
   // check if the query has wordked
   if($res==TRUE)
   {
     //query worked and admin updated
     $_SESSION['update'] = "Admin Updated Successfully";
     //Redirect
     header('location:'.SITEURL.'admin/manage-admin.php');

   }
   else{
     //failed to update
      $_SESSION['update'] = " Falied to Update Admin";
      //Redirect
      header('location:'.SITEURL.'admin/manage-admin.php');
   }

}
?>




<?php include('partials/footer.php'); ?>

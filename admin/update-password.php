<?php include('partials/menu.php');?>
<div class="main-content">
  <div class="wrapper">
    <h1> Change Password </h1>
    <br><br>

    <?php
    if(isset($_GET['id']))
    {
      $id=$_GET['id'];
    }


    ?>
    <form action="" method="POST">
      <table class="tbl-30">
        <tr>
          <td> Current Password </td>
          <td> <input type="password" name="current_password" placeholder="Current Password"> </td>
        </tr>
        <tr>
          <td> New Password </td>
          <td> <input type="password" name="new_password" placeholder="New Password"> </td>
        </tr>
        <tr>
          <td> Confirm Password </td>
          <td> <input type="password" name="confirm_password" placeholder="Confirm Password"> </td>
        </tr>
        <br>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <!-- <a href="add-admin.php" class="btn-primary confirm_password">Add Admin</a> -->
         <br>
          <input type="submit" name="submit" value="Change Password" class="btn-primary confirm_password">


      </table>

      <br>
      <br>
    </form>
    <div>
</div>
<?php
//check if submit is clicked
if(isset($_POST['submit']))
{
  //echo clicked
  //get the database
  $id = $_POST['id'];
  $current_password = (md5($_POST['current_password']));
  $new_password = (md5($_POST['new_password']));
  $confirm_password = (md5($_POST['confirm_password']));


  //check user Cureent id and password

  $sql ="SELECT *FROM tb_admin WHERE Id=$id AND password='$current_password'";
  //run qurey
  $res=mysqli_query($conn, $sql);
  if($res==TRUE)
  {
    //check if data is present
    $count = mysqli_num_rows($res);
    if($count==1)
    {
      //user exists
    //  echo "User Found";
    //check wether new password matches with confirm
    if($new_password==$confirm_password)
    {
      //update password
      $sql2 ="UPDATE tb_admin SET
      password='$new_password'
      WHERE Id=$id

      ";
      //run query

      $res2= mysqli_query($conn,$sql2);
      //check if qeury is working or
      if($res2==true)
      {
        //display Successfully
        $_SESSION['change-password'] = "Password Changed";
        //reedirect
        header('location:'.SITEURL.'admin/manage-admin.php');
      }
      else{
        //display error MessageFormatter
        $_SESSION['change-password'] = "Password Not Changed";
        //reedirect
        header('location:'.SITEURL.'admin/manage-admin.php');
      }
    }
    else{
      //redirect to manage - admin page
      $_SESSION['password-not-match'] = "Password Not Matching";
      //reedirect
      header('location:'.SITEURL.'admin/manage-admin.php');
    }
    }
    else {
      //user not MysqlndUhPreparedStatement
      $_SESSION['user-not-found'] = "User Not Found";
      //reedirect
      header('location:'.SITEURL.'admin/manage-admin.php');
    }
  }

  //check if the new password and conrfirm passwoord match

  //change password if all equal to true

}


?>



















<?php include('partials/footer.php');?>

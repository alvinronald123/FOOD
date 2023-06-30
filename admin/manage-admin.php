<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
  <?php include('partials/menu.php');?>
  </div>
    <!--menu section ends -->
      <!--menu content section starts -->
      <div class=" main-content">
        <div class="wrapper">

            <h1>
            Manage Admin
          </h1>
          <br>
          <?php
          if(isset($_SESSION['add'])){
            echo $_SESSION['add']; // displaying session message
            unset($_SESSION['add']); // stopping session
          }
          if(isset($_SESSION['delete']))
          {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
          }
          if(isset($_SESSION['update']))
          {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
          }
          if(isset($_SESSION['user-not-found']))
          {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
          }
          if(isset($_SESSION['password-not-match']))
          {
            echo $_SESSION['password-not-match'];
            unset($_SESSION['password-not-match']);
          }
          if(isset($_SESSION['change-password']))
          {
            echo $_SESSION['change-password'];
            unset($_SESSION['change-password']);
          }

             ?>
             <br><br><br>
          <!-- button add admin -->
          <a href="add-admin.php" class="btn-primary">Add Admin</a>
          <br><br><br><br>

          <table class="tbl-full">
            <tr>
              <th> S.N.</th>
              <th> Full Name</th>
              <th>Username</th>
              <th>Actions</th>
            </tr>
            <?php
            // get all Admin
            $sql ="SELECT * FROM tb_admin";
            //run HttpQueryString
            $res = mysqli_query($conn, $sql);
            //check if query has get_magic_quotes_runtime
            if($res==TRUE)
            {
              //count get_browser
              $count = mysqli_num_rows($res);  // get all rows in the data base

              $sn =1; //create a variable and asign the value

              // check the number of rows
              if($count>0)
              {
                //we have data in the database
                while($rows= mysqli_fetch_assoc($res)){
                  // we dont have data
                  //while loop will run as long as we have data

                  //get individual data
                  $id=$rows['Id'];
                  $full_name=$rows['full_name'];
                  $username=$rows['username'];

                  //display values
                  ?>
                  <tr>
                  <td><?php echo $sn++;?></td>
                  <td> <?php echo $full_name;?> </td>
                  <td><?php echo $username;?></td>

                  <td>

                    <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
                    <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                      <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                  </td>
                </tr>
                  <?php
                }
              }
              else{
              }

            }
             ?>
          </table>
                </div>
        <!--menu content section ends -->
        <?php require_once ('partials/footer.php');?>
</body>
</html>

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
        <h1> Manage Food</h1>
        <br><br><br>

        <?php  

          if(isset($_SESSION['add']))
              {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
              }
                if(isset($_SESSION['delete']))
              {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
              }
        
        
        
        ?>
        <!-- button add admin -->
        <a href="<?php echo SITEURL;?>admin/add-food.php " class="btn-primary">Add Food</a>
        <br><br><br><br>

        <table class="tbl-full">
          <tr>
            <th> S.N.</th>
            <th> Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Action</th>
          </tr>
          <?php
          $sql = "SELECT * FROM tb_food";

          $res = mysqli_query($conn, $sql);

          $count = mysqli_num_rows($res);
          $sn =1;
          if($count>0)
          {
            while($row=mysqli_fetch_assoc($res))
            {
              $id =$row['id'];
              $title =$row['title'];
              $price =$row['price'];
              $image_name =$row['image_name'];
              $featured =$row['featured'];
              $active =$row['active'];
              ?>
              <tr>
          <td><?php echo $sn++; ?></td>
          <td><?php echo $title; ?></td>
          <td><?php echo $price; ?></td>

          <td><?php echo $image_name; ?></td>

          <td>
            <?php 
            if($image_name=="")
            {
              echo "Image Not Added ";
            }
            else 
            {
              ?>
              <img src="<?php echo SITEURL; ?> images/food/<?php echo $image_name; ?> width='100px';height='50px'; ">
              <?php

            }
            ?> 
          </td>
          <td><?php echo $active; ?></td>
          <td>
            <a href="" class="btn-secondary">Update Food</a>
            <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo 
            $image_name; ?>" class="btn-danger">Delete Food</a>
          </td>
        </tr>
        
              <?php

            }

          }
          else
          {
            echo "<tr> <td colspan='7'> Food Not Added Yet </td> </tr>";
          }
          
          ?>


          

      
        </table>
    </div>

  </div>


  <?php require_once ('partials/footer.php');?>

</body>
</html>

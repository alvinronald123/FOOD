<?php
include('../config/constant.php');

// Check if the form is submitted
if(isset($_POST['submit']))
{
    // Get the form data
    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    // ... retrieve other form fields

    // Check if a new image is uploaded
    if(isset($_FILES['image']['name']))
    {
        $image_name = $_FILES['image']['name'];
        if($image_name != "")
        {
            // Remove the existing image file
            $path = "../images/food/" . $image_name;
            unlink($path);
            
            // Upload the new image file
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
            $new_image_name = "Food_".time().".".$image_ext;
            $image_path = "../images/food/".$new_image_name;
            move_uploaded_file($image_tmp, $image_path);
            
            // Update the image name in the database
            $sql = "UPDATE tb_food SET image_name = '$new_image_name' WHERE id = $id";
            $res = mysqli_query($conn, $sql);
            
            if(!$res)
            {
                // Failed to update the image name in the database
                $_SESSION['update'] = "Failed to update food image";
                header('location:'.SITEURL.'admin/manage-food.php');
                exit();
            }
        }
    }

    // Update the food details in the database
    $sql = "UPDATE tb_food SET title = '$title', price = '$price' WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    if($res)
    {
        // Food updated successfully
        $_SESSION['update'] = "Food updated successfully";
        header('location:'.SITEURL.'admin/manage-food.php');
        exit();
    }
    else
    {
        // Failed to update food
        $_SESSION['update'] = "Failed to update food";
        header('location:'.SITEURL.'admin/manage-food.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php include('..partials/menu.php');?>
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

          if(isset($_SESSION['update']))
          {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
          }
        
        ?>

        <!-- button add admin -->
        <a href="<?php echo SITEURL;?>admin/add-food.php" class="btn-primary">Add Food</a>
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
          $sn = 1;
          if($count > 0)
          {
            while($row = mysqli_fetch_assoc($res))
            {
              $id = $row['id'];
              $title = $row['title'];
              $price = $row['price'];
              $image_name = $row['image_name'];
              $featured = $row['featured'];
              $active = $row['active'];
              ?>
              <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $title; ?></td>
                <td><?php echo $price; ?></td>

                <td>
                  <?php 
                  if($image_name == "")
                  {
                    echo "Image Not Added ";
                  }
                  else 
                  {
                    ?>
                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px" height="50px">
                    <?php
                  }
                  ?> 
                </td>
                <td><?php echo $featured; ?></td>
                <td><?php echo $active; ?></td>
                <td>
                  <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                  <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                </td>
              </tr>
              <?php
            }
          }
          else
          {
            echo "<tr><td colspan='7'>Food Not Added Yet</td></tr>";
          }
          ?>
        </table>
    </div>
  </div>

  <?php include ('..partials/footer.php');?>

</body>
</html>
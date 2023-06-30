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
          <h1> Manage Category</h1>
          <br><br>

              <?php
            
              if(isset($_SESSION['add']))
              {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
              }
              if(isset($_SESSION['remove']))
              {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
              }
              if(isset($_SESSION['delete']))
              {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
              }
              if(isset($_SESSION['no-category-found']))
              {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
              }
              if(isset($_SESSION['upload']))
              {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
              }
              if(isset($_SESSION['add']))
              {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
              }
              if(isset($_SESSION['failed-remove']))
              {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
              }

              ?>
              <br><br><br>
          <!-- button add admin -->
          <a href=" <?php echo SITEURL; ?>admin/add-Category.php " class="btn-primary">Add Category</a>
          <br><br><br><br>

          <table class="tbl-full">
            <tr>
              <th> S.N.</th>
              <th> Title</th>
              <th>Image</th>
              <th>Featured</th>
              <th>Active</th>
              <th>Action</th>
            </tr>
            <?php
            
           // qery to get our data in the databe
            $sql = "SELECT * FROM tb_category";
            //execute query
            $res = mysqli_query($conn , $sql);
            //Count rows
            $count = mysqli_num_rows($res);
            //check wether we have data in the data base
            if($count>0)
            {
              $sn=1;
              //we have data in the database
              // display the error message
              while($row=mysqli_fetch_assoc($res))
              {
                $id = $row['Id'];
                $title = $row['title'];
                $image_name =$row['image_name'];
                $featured =$row['feature'];
                $active = $row['active'];
                  ?>
                  <tr>
                  <td> <?php echo $sn++ ?> </td>
                  <td><?php echo $title ?></td>

                  <td><?php

                  //check whether image name is available or not
                  if($image_name!="")
                  {
                    //show the image
                    ?>
                    <img src=" <?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>
                    " alt="" width="100px"; height="50px">
                    <?php
                  }
                  else{
                    //show Message
                    echo " No Image Added";
                  }

                   ?></</td>

                  <td><?php echo $featured ?></</td>
                  <td><?php echo $active ?></</td>
                  <td>
                  <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                      <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
                  </td>
                </tr>
                      </td>
            </tr>
                  <?php

              }
              ?>
              <div> No Category Added </div>
              <br><br>
              <?php

            }
            else{
              //we dont have data

            }
            if (!$res) {
              die("Query Error: " . mysqli_error($conn));
          }

            ?>

          </table>
      </div>

    </div>


    <?php require_once ('partials/footer.php');?>

  </body>
  </html>

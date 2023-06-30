<?php include('partials/menu.php') ?>
<div class="main-content">
  <div class="wrapper">
    <h1>  Add Category </h1>

    <br><br>

    <?php
    if(isset($_SESSION['add']))
    {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }

    if(isset($_SESSION['upload']))
    {
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
    }
    if(isset($_SESSION['update']))
    {
      echo $_SESSION['update'];
      unset($_SESSION['update']);
    }


    ?>
    <br><br>
     <form action="" method="POST" enctype="multipart/form-data">
       <table class="tbl-30">
         <tr>
           <td>
             Title
           </td>
           <td>
             <input type="text" name="title" placeholder="Category Title">
           </td>
         </tr>
         <tr>
           <td>
             Select Image
           </td>
           <td> <input type="file" name="image"> </td>
         </tr>
         <tr>
           <td>
             Feature
           </td>
           <td>
             <input type="radio" name="featured" value="Yes"> Yes
                <input type="radio" name="featured" value="No" class="radio"> No
           </td>
         </tr>
         <tr>
           <td>
             Active
           </td>
           <td>
             <input type="radio" name="active" value="Yes">Yes
                <input type="radio" name="active" value="No"> No
           </td>
         </tr>
       </table>
       <div class="">
       <input type="submit" name="submit" value="Add Category" class="btn-primary new">
       </div>
     </form>
     <?php
     //check if button is clicked
     if(isset($_POST['submit']))
     {
      // echo "clicked";
      //get value from our form
      $title =$_POST['title'];

      //radio input we need to check wether the btn is selected
      if(isset($_POST['featured']))
      {
        //get the value from fom
        $featured = $_POST['featured'];
      }
      else {
        $featured= "No";

      }
      if(isset($_POST['active']))
      {
        //get the value from fom
        $active = $_POST['active'];
      }
      else {
        $active = "No";

      }
      // check if image is selected or note
    //  print_r($_FILES['image']);

    //  die;  // end
    if(isset($_FILES['image']['name']))
    {
      //upload the image
       //to upload image we need the path , name and destination
       $image_name =$_FILES['image']['name'];
       //upload image only if selected
       if($image_name !="")
       {

              //auto rename
       //get the extenstion of our image (jpg,png......)
       $ext = end(explode('.',$image_name));

       //rename the images
       $image_name = "Food_".rand(000, 999).'.'.$ext;

       $source_path =$_FILES['image']['tmp_name'];

       $destination_path ="../images/category/".$image_name;
       // finally is_uploaded_file
       $upload = move_uploaded_file($source_path, $destination_path);
       //check wether the image is uploaded or not
       //and if the image is not uploaded , then we stop the process and we redirecet with error message
       if($upload==false)
       {
         //set image
         $_SESSION['upload'] = "Failed To Upload Image";
         //redirect
         header('location:'.SITEURL.'admin/add-category.php');
         //stop the process
         die();
       }
      }
    }
    else{
      //dont upload the image and set the value as black
      $image_name="";
    }
      //create query to insert data in the data base
      $sql = "INSERT INTO tb_category SET
      title='$title',
      image_name='$image_name',
      feature='$featured',
      active='$active'
      ";
      $res = mysqli_query($conn, $sql);
      //cehck if its working or note
      if($res==TRUE)
      {
        //working
        $_SESSION['add'] =  "Category Added";
        //redirect
        header('location:'.SITEURL.'admin/manage-category.php');
      }
      else {
        // failed to add
        $_SESSION['add'] =  " Failed To Add Category ";
        //redirect
        header('location:'.SITEURL.'admin/add-category.php');
      }

     }

     ?>

  </div>

</div>

<?php include('partials/footer.php') ?>

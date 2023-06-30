<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br><br>
        <?php  
        
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        
        
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Title of The Food"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td> 
                        <textarea name="description" cols="65" rows="7" placeholder="Food Description Of The Food" style="border-radius: 15px; border:2px solid black;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price"></td>
                </tr>
                <tr>
                    <td>Select Image</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td> 
                        <select name="category">
                            <?php
                            // Create PHP code to display categories from the database
                            // Create SQL query to get active categories
                            
                            $sql = "SELECT * FROM tb_category WHERE active ='Yes'";
                            // Run query
                            $res = mysqli_query($conn, $sql);
                            // Count rows to check whether we have categories
                            $count = mysqli_num_rows($res);
                            // Check if count is greater than 0
                            if($count > 0)
                            {
                                // We have categories
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    // Get the details of the category
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    ?>

                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                    <?php
                                }
                            }
                            else
                            {
                                // We don't have categories
                                ?>
                                <option value="0">No Category Found</option>
                                <?php
                            }
                            // Then we display it on the dropdown
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input type="radio" value="Yes" name="featured">Yes 
                        <input type="radio" value="No" name="featured">No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" value="Yes" name="active">Yes 
                        <input type="radio" value="No" name="active">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-primary new">
                    </td>
                </tr>
            </table>
        </form>
        
        <?php  
        // Check whether the button is clicked
        if(isset($_POST['submit']))
        {
            // Add the food to the database
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            // Check if radios are checked 
            if(isset($_POST['featured']))
            {
                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "No"; // Setting to default
            }
            // Radio for active
            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active = "No"; // Setting to default
            }

            // Upload the image if selected 
            // Check if the selected image is clicked
            if(isset($_FILES['image']['name']))
            {
                // Get the details of the selected image
                $image_name = $_FILES['image']['name'];
                {
                    // Check if the image is selected or not, upload the image if selected 
                    if($image_name != "")
                    {
                        // Image is selected
                        // Get the extension of the selected image (png, jpg)
                        $ext = end(explode('.', $image_name));
                        // Create a new image name
                        $image_name = "Food-Name" . rand(000, 999) . "." . $ext; // New image name
                        // Rename the image
                        // Get the source path and destination path

                        // Source path is the current location
                        $src = $_FILES['image']['tmp_name'];

                        // Destination for image to be uploaded
                        $dst = "../images/food/" . $image_name;

                        // Finally upload
                        $upload_image = move_uploaded_file($src, $dst);

                        // Check if image is uploaded
                        if($upload_image == false)
                        {
                            // Failed to upload
                            $_SESSION['upload'] = "Failed To Upload Image";
                            // Redirect to add food page with error 
                            header('location: ' . SITEURL . 'admin/add-food.php');
                            // End the process
                            die();
                        }
                    }
                }
            }
            else
            {
                $image_name = ""; // Setting to default as blank
            }

            // Insert into database
            // Create the SQL query
            $sql2 = "INSERT INTO tb_food SET
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = '$category',
                featured = '$featured',
                active = '$active'
            ";
  
            // Run the query
            $res2 = mysqli_query($conn, $sql2);

            // Check if data is inserted
            if ($res2 == true) {
                // Data is inserted successfully
                $_SESSION['add'] = "Food has been added";
                header('location: ' . SITEURL . 'admin/manage-food.php');
            } else {
                // Failed to insert data
                $_SESSION['add'] = "Failed to add the food";
                header('location: ' . SITEURL . 'admin/manage-food.php');
            }
        }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>
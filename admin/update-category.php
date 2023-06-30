<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br><br>

        <?php
        // Check if id is set or not
        if (isset($_GET['id'])) {
            // Get id and all other details
            $id = $_GET['id'];
            // Query to get other details
            $sql = "SELECT * FROM tb_category WHERE id = $id";
            // Run query
            $res = mysqli_query($conn, $sql);
            // Count the rows to check id validation
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                // Get all the data
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['feature'];
                $active = $row['active'];
            } else {
                // Redirect to add category
                $_SESSION['no-category-found'] = "Category Not Found";
                header('location:'.SITEURL.'admin/manage-category.php');
                exit();
            }
        } else {
            // Redirect to manage category
            header('location:'.SITEURL.'admin/add-category.php');
            exit();
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" value="<?php echo $title; ?>" placeholder=""></td>
                </tr>
                <tr>
                    <td>Current Image</td>
                    <td>
                        <?php 
                        if ($current_image != "") {
                            // Display image
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="150px">
                            <?php
                        } else {
                            // Display message
                            echo "Image Not Added";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input <?php if ($featured == "Yes") { echo "checked"; } ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if ($featured == "No") { echo "checked"; } ?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input <?php if ($active == "Yes") { echo "checked"; } ?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if ($active == "No") { echo "checked"; } ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>
            </table>
            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
            <input type="hidden" name="Id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Category" class="btn-primary">
        </form>

        <?php
        // Process the form submission
        if (isset($_POST['submit'])) {
            // Get the values from the form
            $id = $_POST['Id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            // Update the new image if selected
            if (isset($_FILES['image']['name'])) {
                // Get the image details
                $image_name = $_FILES['image']['name'];
                // Check if image is available
                if ($image_name != "") {
                    // Upload the new image
                    $ext = end(explode('.', $image_name)); // Get the extension of the image
                    $image_name = "Food_" . rand(000, 999) . '.' . $ext; // Rename the image
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/" . $image_name;
                    $upload = move_uploaded_file($source_path, $destination_path);
                    // Check if the image upload was successful
                    if (!$upload) {
                        // Set error message
                        $_SESSION['upload'] = "Failed To Upload Image";
                        // Redirect
                        header('location:'.SITEURL.'admin/manage-category.php');
                        exit();
                    }
                } else {
                    $image_name = $current_image;
                }

                // Remove the old image if available
                if ($current_image != "") {
                    $remove_path = "../images/category/" . $current_image;
                    $remove = unlink($remove_path);
                    // Check if the old image is removed or not
                    if (!$remove) {
                        // Failed to remove the image
                        $_SESSION['failed-remove'] = "Failed to Remove Current Image";
                        // Redirect
                        header('location:'.SITEURL.'admin/manage-category.php');
                        exit();
                    }
                }

                // Update the database
                $sql2 = "UPDATE tb_category SET
                    title = '$title',
                    image_name = '$image_name',
                    feature = '$featured',
                    active = '$active'
                    WHERE id = $id";
                $res = mysqli_query($conn, $sql2);

                // Redirect
                if ($res) {
                    // Update successful
                    $_SESSION['update'] = "Updated Successfully";
                    header('location: ' . SITEURL . 'admin/manage-category.php');
                    exit();
                } else {
                    // Update failed
                    $_SESSION['update'] = "Update Failed";
                    header('location: ' . SITEURL . 'admin/manage-category.php');
                    exit();
                }
            }
        }
        ?>
    </div>
</div>
<?php include('partials/footer.php'); ?>
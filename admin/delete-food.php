<?php

include('../config/constant.php');

if (isset($_GET['id']) && isset($_GET['image_name'])) {

  //echo "die";
   //die();
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // Remove the image file from the folder
    if ($image_name != "") {
        $path = "../images/food/" . $image_name;
        $remove = unlink($path);

        if ($remove == false) {
            // Failed to remove image
            $_SESSION['delete'] = "Failed to remove food image";
            header('location:'.SITEURL.'admin/manage-food.php');
            die();
        }
    }

    // Delete the food from the database
    $sql = "DELETE FROM tb_food WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        // Food deleted successfully
        $_SESSION['delete'] = "Food deleted successfully";
        header('location:'.SITEURL.'admin/manage-food.php');
    } else {
        // Failed to delete food
        $_SESSION['delete'] = "Failed to delete food";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
} else {
    // Redirect to manage food page
    header('location:'.SITEURL.'admin/manage-food.php');
}
?>
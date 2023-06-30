<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include constants
include('../config/constant.php');

if (isset($_GET['id']) && isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // Remove the physical image if available
    if ($image_name != "") {
        // Image path is available, so remove the image
        $path = "../images/category/" . $image_name;

        // Check if the file exists before deleting
        if (file_exists($path)) {
            // Attempt to delete the file
            $remove = unlink($path);

            // Check if the file deletion was successful
            if ($remove) {
                // File deleted successfully
                $_SESSION['remove'] = "Image Deleted Successfully";
            } else {
                // Failed to remove the image
                $_SESSION['remove'] = "Failed To Remove The Image";
            }
        } else {
            // File does not exist
            $_SESSION['remove'] = "Image does not exist";
        }
    }

    // Delete data from the database
    $sql = "DELETE FROM tb_category WHERE id = $id";

    // Run the query
    $res = mysqli_query($conn, $sql);

    // Check if data has been deleted
    if ($res) {
        // Category deleted successfully
        $_SESSION['delete'] = "Category Deleted Successfully";
    } else {
        // Failed to delete category
        $_SESSION['delete'] = "Failed To Delete Category";
    }

    // Redirect to the management page
    header('location:'.SITEURL.'admin/manage-category.php');
    exit();
} else {
    // Invalid parameters, redirect to the management page
    header('location:'.SITEURL.'admin/manage-category.php');
    exit();
}
?>
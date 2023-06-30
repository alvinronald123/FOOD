<?php include('menu.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <img src="images/food_logo.png" alt="FOOD_HUB.com" class="img-responsive">
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- Categories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
            // Fetch the category items
            $sql = "SELECT * FROM tb_category";
            $res = mysqli_query($conn, $sql);

            if ($res) {
                $count = mysqli_num_rows($res);
                $sn = 1;

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['Id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                        <a href="#" class="box-3 float-container">
                            <div class="box-3-img">
                                <?php
                                if ($image_name != "") {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                    <?php
                                } else {
                                    echo "Image Not Available";
                                }
                                ?>
                            </div>

                            <div class="float-text text-white">
                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                } else {
                    echo "<p>No category items found.</p>";
                }
            } else {
                echo "Failed to fetch category items. Please try again.";
            }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><span class="icon-face">Facebook <img src="svgs/facebook-messenger.svg" alt="" class="img"> </span> </a>
                </li>

                <li>
                    <a href="#"> <span class="icon-face"> Instagram <img src="svgs/instagram.svg" alt="" class="img"> </span> </a>
                </li>

                <li>
                    <a href="#"> <span class="icon-face"> Twitter <img src="svgs/twitter.svg" alt="" class="img"> </span> </a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>2023 <a href="#">GROUP</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>

</html>
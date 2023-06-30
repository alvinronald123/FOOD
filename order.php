<?php include ('menu.php');?>
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
      <image src="images/food_logo.png" alt=" FOOD_HUB.com" class="img-responsive">
      </div>

            <div class="menu text-right">
                <ul>
                <li>
              <a href="<?php echo SITEURL;?>">Home</a>
              </li>

              <li>
                <a href="<?php echo SITEURL;?>categories.php">Categories</a>
                </li>

                <li>
                  <a href="<?php echo SITEURL;?>foods.php">Foods</a>
                  </li>

                  <li>
                    <a href="<?php echo SITEURL;?>"> Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">

            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="#" class="order text-center">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h3>Food Title</h3>
                        <p class="food-price">shs 20000</p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>

                    </div>

                </fieldset>

                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
              <li>
                <a href="#"><span class="icon-face">Facebook <img src="svgs/facebook-messenger.svg" alt="" class="img"> </span> </a>
                        </li>

                        <li>
                          <a href="#"> <span class="icon-face"> Instagram <img src="svgs/instagram.svg" alt="" class="img"> </span>  </a>
                          </li>

                          <li>
                            <a href="#"> <span class="icon-face"> Twitter <img src="svgs/twitter.svg" alt="" class="img"> </span>  </a>
                            </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>2023<a href="#">GROUP</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->
   

</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
  <?php include('partials/menu.php');?>
      <!--menu content section starts -->
      <div class=" main-content">
        <div class="wrapper">

            <h1>
            DASHBOARD
          </h1>
          <br>
          <br>
          <?php
          if(isset($_SESSION['login']))
          {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
          }


           ?>
           <br>
           <br>

          <div class="col-4 text-center">
            <h1>5</h1>
            <br>
            Categories
          </div>
          <div class="col-4 text-center">
            <h1>5</h1>
            <br>
            Foods
          </div>
          <div class="col-4 text-center">
            <h1>5</h1>
            <br>
            Total Orders
          </div>
          <div class="col-4 text-center">
            <h1>5</h1>
            <br>
            Total Tax Charged
          </div>
        <div class="clear-fix">
        </div>
        </div>

      </div>
      <?php require_once ('partials/footer.php');?>
</body>
</html>

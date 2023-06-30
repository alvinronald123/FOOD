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
        <h1> Manage Order</h1>
        <br><br><br>
        <!-- button add admin -->
        <a href="" class="btn-primary">Add Admin</a>
        <br><br><br><br>

        <table class="tbl-full">
          <tr>
            <th> S.N.</th>
            <th> Full Name</th>
            <th>Username</th>
            <th>Actions</th>
          </tr>
          <tr>
          <td>1.</td>
          <td>Alvin</td>
          <td>Ronald</td>
          <td>
            <a href="" class="btn-secondary">Update Admin</a>
              <a href="" class="btn-danger">Delete Admin</a>
          </td>
        </tr>

        <tr>
        <td>2.</td>
        <td>Alvin</td>
        <td>Ronald</td>
        <td>
          <a href="" class="btn-secondary">Update Admin</a>
            <a href="" class="btn-danger">Delete Admin</a>
        </td>
      </tr>
      <tr>
      <td>3.</td>
      <td>Alvin</td>
      <td>Ronald</td>
      <td>
        <a href="" class="btn-secondary">Update Admin</a>
          <a href="" class="btn-danger">Delete Admin</a>
      </td>
    </tr>
        </table>
    </div>

  </div>


  <?php require_once ('partials/footer.php');?>

</body>
</html>

<?php include "php/read.php"; ?>
<!DOCTYPE html>
<html>

<head>
  <title>Products | Samantha</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/e96c3f3ee3.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/read.css" />
  <?php
  include('short/icon.php');
  ?>
</head>

<body>
  <?php
  include('short/navbar.php');
  ?>
  <div class="container">
    <div class="box">
      <h4 class="display-4 text-center" style="padding-top: 50px;">Products</h4><br>
      <div style="text-align: right; margin-bottom: 20px;">
        <button class="btn btn-primary" name="update" onclick="window.location.href='create.php'">
          Create
        </button>
      </div>



      <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo $_GET['success']; ?>
        </div>
      <?php } ?>
      <?php if (mysqli_num_rows($result)) { ?>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Product Name</th>
              <th scope="col">Expiration Date</th>
              <th scope="col">Stock</th>
              <th scope="col">Brand</th>
              <th scope="col">Category</th>
              <th scope="col">Price</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0;
            while ($rows = mysqli_fetch_assoc($result)) {
              $i++;
              $expirationDate = strtotime($rows['expiration']);
              $today = strtotime(date('Y-m-d'));
              $status = $rows['status'];
              $stock = $rows['stock'];


              $expirationColor = ($expirationDate < strtotime('+2 months', $today)) ? 'red' : 'green';


              $stockColor = ($stock < 6) ? 'red' : 'green';


              $statusColor = ($status == 'Available') ? 'green' : 'red';

              ?>
              <tr>
                <td>
                  <?php echo $rows['id']; ?>
                </td>
                <td>
                  <?php echo $rows['product']; ?>
                </td>
                <td style="color: <?php echo $expirationColor; ?>"><?php echo $rows['expiration']; ?></td>
                <td style="color: <?php echo $stockColor; ?>"><?php echo $stock; ?></td>
                <td>
                  <?php echo $rows['brand']; ?>
                </td>
                <td>
                  <?php echo $rows['category']; ?>
                </td>
                <td>
                  <?php echo $rows['price']; ?>
                </td>
                <td style="color: <?php echo $statusColor; ?>"><?php echo $status; ?></td>
                <td>
                  <a href="update.php?id=<?= $rows['id'] ?>" class="btn btn-success">Update</a>
                  <a href="php/delete.php?id=<?= $rows['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              <?php
            } ?>
          </tbody>
        </table>
      <?php } ?>

    </div>
  </div>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/accountmanager.css" />
  <?php
  include('short/icon.php');
  ?>
  <title>Account Manager | Samantha</title>
</head>

<body>
  <?php
  include('short/navbar.php');
  ?>
  <div class="container">
    <h4 class="display-4 text-center">Account Manager</h4><br>
    <div style="text-align: right; margin-bottom: 20px;">
      <button type="button" class="btn btn-primary" onclick="window.location.href='create_account1.php'">Add
        Account</button>
    </div>
    <div class="table-responsive">
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "samantha";

      $conn = mysqli_connect($servername, $username, $password, $dbname);
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT * FROM users WHERE user_role <> 'admin'";
      $result = mysqli_query($conn, $sql);

      echo '<table class="table table-bordered table-hover">';
      echo '<thead><tr><th>ID</th><th>Email</th><th>Password</th><th>Role</th><th>Action</th></tr></thead>';
      echo '<tbody>';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row["user_id"] . '</td>';
        echo '<td>' . $row["user_email"] . '</td>';
        echo '<td>' . $row["user_pass"] . '</td>';
        echo '<td>' . $row["user_role"] . '</td>';
        echo '<td><a href="delete.php?id=' . $row["user_id"] . '">Delete</a></td>';

      }
      echo '</tbody>';
      echo '</table>';

      mysqli_close($conn);
      ?>

    </div>
  </div>
</body>

</html>
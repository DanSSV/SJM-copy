<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/create_account.css" />
  <?php
  include('short/icon.php');
  ?>
  <title>Create User | Samantha</title>
</head>

<body>
  <?php
  include('short/navbar.php');
  ?>
  <div class="container">
    <h2>Create User</h2>
    <form action="create_account.php" method="post">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button class="create-account-button" name="submit">Create Account</button>
      <button class="creates-account-button" onclick="window.location.href='accountmanager.php'">Back</button>
    </form>
  </div>
</body>

</html>
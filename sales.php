<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/f8daa09b38.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/sales.css" />
  <title>Dashboard | Samantha</title>
  <?php
  include('short/icon.php');
  ?>
  <style>
  .svg-icon {
    fill: white;
  }
</style>
</head>

<body>
  <?php
  include('short/navbar.php');
  ?>
  <div class="container text-center" style="margin-top: 200px;">
    <div class="row">
      <div class="col">
        <a href="salestoday.php">
          <button class="btn btn-success"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 576 512">
              <path
                d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
            </svg>Sales Today</button>
        </a>
      </div>

      <div class="col">
        <?php
        include('db_conn.php');

        $sql = "SELECT COUNT(*) as count FROM products WHERE stock > 6";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
          die('Error: ' . mysqli_error($conn));
        }

        $row = mysqli_fetch_assoc($result);
        $count = $row["count"];

        echo '<button class="btn btn-primary" onclick="location.href=\'instock.php\'"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M248 0H208c-26.5 0-48 21.5-48 48V160c0 35.3 28.7 64 64 64H352c35.3 0 64-28.7 64-64V48c0-26.5-21.5-48-48-48H328V80c0 8.8-7.2 16-16 16H264c-8.8 0-16-7.2-16-16V0zM64 256c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H184v80c0 8.8-7.2 16-16 16H120c-8.8 0-16-7.2-16-16V256H64zM352 512H512c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H472v80c0 8.8-7.2 16-16 16H408c-8.8 0-16-7.2-16-16V256H352c-15 0-28.8 5.1-39.7 13.8c4.9 10.4 7.7 22 7.7 34.2V464c0 12.2-2.8 23.8-7.7 34.2C323.2 506.9 337 512 352 512z"/></svg>In Stock (' . $count . ')</button>';

        mysqli_close($conn);
        ?>
      </div>
      <div class="col">
        <?php
        include('db_conn.php');

        $sql = "SELECT COUNT(*) as count FROM products WHERE stock < 6";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
          die('Error: ' . mysqli_error($conn));
        }

        $row = mysqli_fetch_assoc($result);
        $count = $row["count"];

        echo '<button class="btn btn-danger" onclick="location.href=\'lowstock.php\'"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 488V171.3c0-26.2 15.9-49.7 40.2-59.4L308.1 4.8c7.6-3.1 16.1-3.1 23.8 0L599.8 111.9c24.3 9.7 40.2 33.3 40.2 59.4V488c0 13.3-10.7 24-24 24H568c-13.3 0-24-10.7-24-24V224c0-17.7-14.3-32-32-32H128c-17.7 0-32 14.3-32 32V488c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24zm488 24l-336 0c-13.3 0-24-10.7-24-24V432H512l0 56c0 13.3-10.7 24-24 24zM128 400V336H512v64H128zm0-96V224H512l0 80H128z"/></svg>Low Stock (' . $count . ')</button>';

        mysqli_close($conn);
        ?>
      </div>

    </div>
  </div>

</body>

</html>
<!DOCTYPE html>
<html>

<head>
  <title>Inventory Report | SamanthaJM</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/e96c3f3ee3.js" crossorigin="anonymous"></script>
  <?php
  include('short/icon.php');
  ?>
  <link rel="stylesheet" href="css/inventory_report.css" />
</head>

<body>
  <?php
  include('short/navbar.php');
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="display-4 text-center">Inventory Report</h4><br>

        <form>
          <div class="form-group" style="margin-right: 1150px;">
            <label for="fromDate">From:</label>
            <input type="date" class="form-control" id="fromDate" name="fromDate" />
          </div>
          <div class="form-group" style="margin-right: 1150px;">
            <label for="toDate">To:</label>
            <input type="date" class="form-control" id="toDate" name="toDate" />
          </div>
          <button type="button" class="btn btn-success" onclick="getData()">
            Get data
          </button>
          <button type="button" class="btn btn-primary" onclick="printTable()">
            Print Table
          </button>
          <button class="btn btn-danger" id="reorderBtn" style="float: right;">Re-order</button>


        </form>
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="dataTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Expiration Date</th>
                <th>Stock</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Price</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script type="text/javascript"></script>
  <script src="js/script.js"></script>
  <script>
    $("#reorderBtn").click(function () {
      reorder();
    });

    function reorder() {
      $.ajax({
        url: "reorder.php",
        method: "GET",
        dataType: "json",
        success: function (data) {
          if (data.status === "success") {
            alert("Re-order successful");
            getData();
          } else {
            alert("Re-order failed");
          }
        },
      });
    }
  </script>
</body>

</html>
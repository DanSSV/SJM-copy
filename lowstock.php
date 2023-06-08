<?php include "php/read.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Low Stock | Samantha</title>
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
            <h4 class="display-4 text-center" style="padding-top: 50px;">Low Stock</h4><br>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $stock = $rows['stock'];
                            if ($stock < 6) {
                                $i++;
                                $expirationDate = strtotime($rows['expiration']);
                                $today = strtotime(date('Y-m-d'));
                                $status = $rows['status'];

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
                                </tr>
                                <?php
                            }
                        }
                        if ($i == 0) {
                            echo "No products with less than 6 in stock.";
                        }
                        ?>

                    </tbody>
                </table>
            <?php } ?>

        </div>
    </div>
</body>

</html>
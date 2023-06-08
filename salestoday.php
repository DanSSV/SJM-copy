<?php include "php/history.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Sales Today | Samantha</title>
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
            <h4 class="display-4 text-center" style="padding-top: 50px;">Sales Today</h4><br>



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
                           
                            <th scope="col">Price</th>
                            
            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $i++;
                            $expirationDate = strtotime($rows['expiration']);
                            $today = strtotime(date('Y-m-d'));
                           


                            $expirationColor = ($expirationDate < strtotime('+2 months', $today)) ? 'red' : 'green';



                            ?>
                            <tr>
                                <td>
                                    <?php echo $rows['id']; ?>
                                </td>
                                <td>
                                    <?php echo $rows['product']; ?>
                                </td>
                               
                                    <?php echo $rows['brand']; ?>
                                </td>
                                <td>
                                    <?php echo $rows['category']; ?>
                                </td>
                                <td>
                                    <?php echo $rows['price']; ?>
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
<?php

$product_name = $_POST['product-name'];
$quantity = $_POST['quantity'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "samantha";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT stock FROM products WHERE product = '$product_name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $current_stock = $row['stock'];
} else {
    echo "Product not found";
    exit;
}

$new_stock = $current_stock - $quantity;

if ($new_stock < 0) {
    echo "Not enough stock";
    exit;
}

$sql = "UPDATE products SET stock = $new_stock WHERE product = '$product_name'";
if (mysqli_query($conn, $sql)) {
    echo "Stock updated successfully";
} else {
    echo "Error updating stock: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
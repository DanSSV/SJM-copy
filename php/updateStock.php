<?php
$productName = $_POST["productName"];
$quantity = $_POST["quantity"];

$conn = mysqli_connect("localhost", "root", "", "samantha");
$query = "SELECT stock FROM products WHERE name = '" . mysqli_real_escape_string($conn, $productName) . "'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$currentStock = $row["stock"];

$newStock = $currentStock - $quantity;

$query = "UPDATE products SET stock = " . $newStock . " WHERE name = '" . mysqli_real_escape_string($conn, $productName) . "'";
mysqli_query($conn, $query);

echo $newStock;

mysqli_close($conn);
?>
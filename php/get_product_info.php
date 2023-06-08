<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "samantha";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productName = $_POST["product_name"];

$sql = "SELECT brand, category, price, stock, status FROM products WHERE product = '$productName'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array(
        "brand" => $row["brand"],
        "category" => $row["category"],
        "price" => $row["price"],
        "stock" => $row["stock"],
        "status" => $row["status"]
    );
    echo json_encode($response);
} else {
    echo "0 results";
}



$conn->close();
?>
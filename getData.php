<?php
include('db_conn.php');

$fromDate = $_POST["fromDate"];
$toDate = $_POST["toDate"];

$sql = "SELECT * FROM products WHERE expiration BETWEEN '$fromDate' AND '$toDate'";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
?>
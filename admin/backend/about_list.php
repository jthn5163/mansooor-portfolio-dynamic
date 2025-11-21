<?php
header('Content-Type: application/json');
include('db.php'); // <--- Your DB connection

$respo = [];
$query = "SELECT * FROM about ORDER BY created_at DESC";
$result = $conn->query($query);

$respo['rows'] = [];
while ($row = $result->fetch_assoc()) {
    $row['positions'] = json_decode($row['positions'], true); // decode array
    $respo['rows'][] = $row;
}

echo json_encode($respo);


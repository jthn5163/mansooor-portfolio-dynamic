<?php
include('../db/db_connect.php'); 
$sql = "SELECT * FROM banner ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode(['rows' => $rows]);

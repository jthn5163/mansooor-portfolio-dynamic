<?php
header('Content-Type: application/json');
include('db.php');

$respo = ['rows' => []];
$sql = "SELECT * FROM experience ORDER BY createdAt DESC";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  $respo['rows'][] = $row;
}
echo json_encode($respo);


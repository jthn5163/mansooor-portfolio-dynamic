<?php
header('Content-Type: application/json');
include('db.php');

$respo = ['rows' => []];
$sql = "SELECT * FROM filmography ORDER BY year DESC, id DESC";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  $respo['rows'][] = $row;
}
echo json_encode($respo);


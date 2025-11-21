<?php
header('Content-Type: application/json');
include('db.php');
$respo = [];
$respo['rows'] = [];
$q = $conn->query("SELECT * FROM banner ORDER BY createdAt DESC");
while ($row = $q->fetch_assoc()) {
  $respo['rows'][] = $row;
}
echo json_encode($respo);
?>

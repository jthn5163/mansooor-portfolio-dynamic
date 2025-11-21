<?php
header('Content-Type: application/json');
include('db.php');

$respo = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
  $id = intval($_POST['id']);
  $stmt = $conn->prepare("DELETE FROM experience WHERE id=?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $respo['status'] = $stmt->affected_rows > 0 ? 'success' : 'error';
  if ($respo['status'] === 'error') $respo['msg'] = $stmt->error;
  $stmt->close();
} else {
  $respo['status'] = 'error'; $respo['msg'] = 'Invalid request';
}
echo json_encode($respo);


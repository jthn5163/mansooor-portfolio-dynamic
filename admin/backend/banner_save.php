<?php
header('Content-Type: application/json');
include('db.php');
$respo = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $banner_name = $_POST['banner_name'] ?? '';
  $banner_img = '';
  if (!empty($_FILES['banner_img']['name'])) {
    $target_dir = "uploads/";
    $filename   = uniqid('banner_') . '_' . basename($_FILES["banner_img"]["name"]);
    $target_file = $target_dir . $filename;
    if (move_uploaded_file($_FILES["banner_img"]["tmp_name"], $target_file)) {
      $banner_img = $target_file;
    }
  }
  $sql = "INSERT INTO banner (banner_name, banner_img) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $banner_name, $banner_img);
  $stmt->execute();
  $respo['status'] = $stmt->affected_rows > 0 ? 'success' : 'error';
  $stmt->close();
} else {
  $respo['status'] = 'error'; $respo['msg'] = 'Invalid request';
}
echo json_encode($respo);
?>


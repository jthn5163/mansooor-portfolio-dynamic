<?php
header('Content-Type: application/json');
include('db.php');

$respo = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
  $id          = intval($_POST['id']);
  $title       = $_POST['title'] ?? '';
  $year        = $_POST['year'] ?? '';
  $role        = $_POST['role'] ?? '';
  $production  = $_POST['production'] ?? '';
  $type        = $_POST['type'] ?? '';
  $release     = $_POST['release'] ?? '';
  $description = $_POST['description'] ?? '';
  $awards      = $_POST['awards'] ?? '';
  $project_img = '';

  if (!empty($_FILES['project_img']['name'])) {
    $target_dir = "uploads/";
    $filename   = uniqid('project_') . '_' . basename($_FILES["project_img"]["name"]);
    $target_file = $target_dir . $filename;
    if (move_uploaded_file($_FILES["project_img"]["tmp_name"], $target_file)) {
      $project_img = $target_file;
    }
  }

  if ($project_img) {
    $sql = "UPDATE experience SET 
      title=?, year=?, role=?, production=?, type=?, `release`=?, project_img=?, description=?, awards=?
      WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $title, $year, $role, $production, $type, $release, $project_img, $description, $awards, $id);
  } else {
    $sql = "UPDATE experience SET 
      title=?, year=?, role=?, production=?, type=?, `release`=?, description=?, awards=?
      WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $title, $year, $role, $production, $type, $release, $description, $awards, $id);
  }
  $stmt->execute();
  $respo['status'] = $stmt->affected_rows > 0 ? 'success' : 'error';
  if ($respo['status'] === 'error') $respo['msg'] = $stmt->error;
  $stmt->close();
} else {
  $respo['status'] = 'error'; $respo['msg'] = 'Invalid request';
}
echo json_encode($respo);


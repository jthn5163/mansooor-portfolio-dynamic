<?php
header('Content-Type: application/json');
include('db.php');

$respo = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
  $id        = intval($_POST['id']);
  $film_name = $_POST['film_name'] ?? '';
  $year      = $_POST['year'] ?? '';
  $genre     = $_POST['genre'] ?? '';
  $role      = $_POST['role'] ?? '';
  $director  = $_POST['director'] ?? '';
  $status    = $_POST['status'] ?? '';
  $film_desc = $_POST['film_desc'] ?? '';
  $video_url = $_POST['video_url'] ?? '';
  
  $image = '';
  if (!empty($_FILES['image']['name'])) {
    $target_dir = "uploads/";
    $filename = uniqid('film_') . '_' . basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $filename;
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $image = $target_file;
    }
  }

  if ($image) {
    $sql = "UPDATE filmography SET 
      film_name=?, year=?, genre=?, role=?, director=?, status=?, film_desc=?, video_url=?, image=?
      WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $film_name, $year, $genre, $role, $director, $status, $film_desc, $video_url, $image, $id);
  } else {
    $sql = "UPDATE filmography SET 
      film_name=?, year=?, genre=?, role=?, director=?, status=?, film_desc=?, video_url=?
      WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $film_name, $year, $genre, $role, $director, $status, $film_desc, $video_url, $id);
  }
  $stmt->execute();
  $respo['status'] = $stmt->affected_rows > 0 ? 'success' : 'error';
  if ($respo['status'] === 'error') $respo['msg'] = $stmt->error;
  $stmt->close();
} else {
  $respo['status'] = 'error'; $respo['msg'] = 'Invalid request';
}
echo json_encode($respo);


<?php
header('Content-Type: application/json');
include('db.php');

$respo = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $film_name  = $_POST['film_name'] ?? '';
  $year       = $_POST['year'] ?? '';
  $genre      = $_POST['genre'] ?? '';
  $role       = $_POST['role'] ?? '';
  $director   = $_POST['director'] ?? '';
  $status     = $_POST['status'] ?? '';

  // Handle image upload
  $image = '';
  if (!empty($_FILES['image']['name'])) {
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) { mkdir($target_dir, 0755, true); }
    $filename = uniqid('film_') . '_' . basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $filename;
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $image = $target_file;
    }
    if ($image == '') {
      $respo['status'] = 'error';
      $respo['msg'] = 'Image upload failed. Check folder permissions.';
      echo json_encode($respo);
      exit;
    }
  }

  $sql = "INSERT INTO filmography 
    (film_name, year, genre, role, director, status, image) 
    VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssss", $film_name, $year, $genre, $role, $director, $status, $image);
  $stmt->execute();
  $respo['status'] = $stmt->affected_rows > 0 ? 'success' : 'error';
  if ($respo['status'] === 'error') $respo['msg'] = $stmt->error;
  $stmt->close();
} else {
  $respo['status'] = 'error'; $respo['msg'] = 'Invalid request';
}
echo json_encode($respo);
?>

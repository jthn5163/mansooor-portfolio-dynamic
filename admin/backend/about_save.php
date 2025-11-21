<?php
header('Content-Type: application/json');
include('db.php');

$respo = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $positions    = isset($_POST['position']) ? $_POST['position'] : [];
    $films        = $_POST['films'] ?? '';
    $experience   = $_POST['experience'] ?? '';
    $description  = $_POST['about'] ?? ''; // Store "about" field as description
    $heading      = $_POST['heading'] ?? ''; // Use if you collect heading from your form

    $profile_image = '';
    if (!empty($_FILES['profileImage']['name'])) {
        $target_dir = "uploads/";
        $filename   = uniqid('profile_') . '_' . basename($_FILES["profileImage"]["name"]);
        $target_file = $target_dir . $filename;
        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
            $profile_image = $target_file;
        }
    }

    $positions_json = json_encode($positions);

    // Adjust columns to actual table!
    $sql = "INSERT INTO `about` (`profile_image`, `positions`, `films`, `experience`, `heading`, `description`)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $profile_image, $positions_json, $films, $experience, $heading, $description);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $respo['status'] = 'success';
    } else {
        $respo['status'] = 'error';
        $respo['msg']    = $stmt->error;
    }
    $stmt->close();
} else {
    $respo['status'] = 'error';
    $respo['msg'] = 'Invalid request method';
}

echo json_encode($respo);


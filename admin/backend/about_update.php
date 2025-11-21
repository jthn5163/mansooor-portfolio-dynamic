<?php
header('Content-Type: application/json');
include('db.php');

$respo = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
    $id          = intval($_POST['id']);
    $positions   = isset($_POST['position']) ? $_POST['position'] : [];
    $films       = $_POST['films'] ?? '';
    $experience  = $_POST['experience'] ?? '';
    $description = $_POST['about'] ?? '';
    $heading     = $_POST['heading'] ?? '';

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

    // If new image, update profile_image, else keep original
    if ($profile_image) {
        $sql = "UPDATE `about` SET 
                    `profile_image`=?, `positions`=?, `films`=?, `experience`=?, `heading`=?, `description`=?
                WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $profile_image, $positions_json, $films, $experience, $heading, $description, $id);
    } else {
        $sql = "UPDATE `about` SET 
                    `positions`=?, `films`=?, `experience`=?, `heading`=?, `description`=?
                WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $positions_json, $films, $experience, $heading, $description, $id);
    }
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $respo['status'] = 'success';
        $respo['action'] = 'updated';
    } else {
        $respo['status'] = 'error';
        $respo['msg']    = $stmt->error;
    }
    $stmt->close();

} else {
    $respo['status'] = 'error';
    $respo['msg'] = 'Invalid request or missing id';
}

echo json_encode($respo);


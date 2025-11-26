<?php
header('Content-Type: application/json');
include('db.php');
$respo = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
    $id = intval($_POST['id']);
    $banner_name = $_POST['banner_name'] ?? '';
    $banner_role = $_POST['banner_role'] ?? '';
    $banner_description = $_POST['banner_description'] ?? '';
    $banner_img = '';

    // Handle image upload if provided
    if (!empty($_FILES['banner_img']['name'])) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $filename = uniqid('banner_') . '_' . basename($_FILES["banner_img"]["name"]);
        $target_file = $target_dir . $filename;
        if (move_uploaded_file($_FILES["banner_img"]["tmp_name"], $target_file)) {
            $banner_img = $target_file;
        }
    }

    // Build query, depending on if the image gets updated
    if ($banner_img) {
        $sql = "UPDATE banner SET banner_name=?, banner_role=?, banner_description=?, banner_img=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $banner_name, $banner_role, $banner_description, $banner_img, $id);
    } else {
        $sql = "UPDATE banner SET banner_name=?, banner_role=?, banner_description=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $banner_name, $banner_role, $banner_description, $id);
    }
    $stmt->execute();

    // Always return success if the query executed
    $respo['status'] = 'success';
    $stmt->close();
} else {
    $respo['status'] = 'error';
    $respo['msg'] = 'Invalid request';
}

echo json_encode($respo);
?>



<?php
header('Content-Type: application/json');
include('db.php');

$respo = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM about WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $respo['status'] = 'success';
    } else {
        $respo['status'] = 'error';
        $respo['msg'] = $stmt->error;
    }
    $stmt->close();
} else {
    $respo['status'] = 'error';
    $respo['msg'] = 'Invalid request';
}
echo json_encode($respo);


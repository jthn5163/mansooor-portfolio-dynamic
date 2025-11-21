<?php
session_start();

include("db.php");

// Get request data (can be either username or email)
$user_identifier = $_POST['userinput'] ?? '';
$password = $_POST['password'] ?? '';

// Query for user: check if identifier matches username OR email
$stmt = $conn->prepare("SELECT * FROM admin WHERE (username=? OR email=?) AND password=?");
$stmt->bind_param("sss", $user_identifier, $user_identifier, $password);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    $_SESSION['admin_id'] = $user['id'];
    echo json_encode(['success' => true]);
    // Or: header("Location: admin_dashboard.php"); exit;
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
}
$conn->close();
?>

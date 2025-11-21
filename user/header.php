<?php
include('./db/db_connect.php');

$admin = $conn->query("SELECT * FROM admin LIMIT 1")->fetch_assoc();
$profilePic = $admin && !empty($admin['profile_pic']) ? 'uploads/'.$admin['profile_pic'] : 'assets/img/default.jpg';
$username = $admin['username'] ?? 'Jithin E.V.';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Portfolio</title>

<!-- Bootstrap 5 CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Root Colors -->
<style>
:root {
  --primary: #4f46e5;
  --primary-dark: #3730a3;
  --primary-light: #818cf8;
  --secondary: #f59e0b;
  --secondary-dark: #b45309;
  --secondary-light: #fcd34d;
  --white: #ffffff;
  --black: #111827;
}

.navbar-custom {
  background-color: var(--primary);
}

.navbar-custom .navbar-brand,
.navbar-custom .nav-link {
  color: var(--white);
}

.navbar-custom .nav-link:hover {
  color: var(--secondary-light);
}

.navbar-custom .nav-link.active {
  color: var(--secondary);
  font-weight: 600;
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center" href="index.php">
      <img src="<?= $profilePic ?>" alt="Profile" class="rounded-circle me-2" width="35" height="35" 
           style="object-fit: cover; border:2px solid var(--secondary);">
      <?= htmlspecialchars($username) ?>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#userNavbar" 
            aria-controls="userNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="userNavbar">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="#about">About Me</a></li>
        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Bootstrap JS Bundle CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

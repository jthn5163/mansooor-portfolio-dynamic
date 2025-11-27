<?php

$sql = "SELECT * FROM banner ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

$banner = $result->fetch_assoc();

// Provide default values if database is empty or fields are missing
$banner_name = $banner['banner_name'] ?? 'Your Name';
$banner_role = $banner['banner_role'] ?? 'Assistant Director';
$banner_description = $banner['banner_description'] ?? 'Crafting Cinematic Excellence, One Frame at a Time';
$banner_img = $banner['banner_img'];
$banner_img_url = '/MANSOOR-PORTFOLIO-DYNAMIC/admin/backend/' . $banner_img;
?>


<section id="home" class="cinematic-hero">
  <div class="hero-overlay"></div>
  <img src="<?= htmlspecialchars($banner_img_url) ?>"  alt="Cinematic Hero" class="hero-background-image">
  <div class="hero-content-wrapper">
    <div class="container">
      <div class="hero-text-content">
        <span class="hero-tag"><?= htmlspecialchars($banner_role) ?></span>
        <h1 class="hero-main-title"><?= htmlspecialchars($banner_name) ?></h1>
        <p class="hero-tagline"><?= htmlspecialchars($banner_description) ?></p>
        <div class="hero-buttons">
          <a href="#filmography" class="btn-modern btn-primary-modern">
            <span>Explore Portfolio</span>
            <i class="bi bi-arrow-right"></i>
          </a>
          <a href="#contact" class="btn-modern btn-outline-modern">
            <span>Let's Collaborate</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

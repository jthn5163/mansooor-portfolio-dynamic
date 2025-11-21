<?php
// Include database connection
include('./db/db_connect.php');

// Fetch Admin info
$adminResult = $conn->query("SELECT * FROM admin LIMIT 1");
$admin = $adminResult && $adminResult->num_rows > 0 ? $adminResult->fetch_assoc() : null;

// Fetch About section
$aboutResult = $conn->query("SELECT * FROM about LIMIT 1");
$about = $aboutResult && $aboutResult->num_rows > 0 ? $aboutResult->fetch_assoc() : null;


// Profile picture
$profilePic = !empty($admin['profile_pic']) ? 'uploads/' . $admin['profile_pic'] : 'assets/img/default.jpg';
$username = $admin['username'] ?? 'Alex Thompson';

// Dummy data for film projects
$filmProjects = [
    [
        'title' => 'The Last Horizon',
        'year' => '2024',
        'role' => 'Assistant Director',
        'genre' => 'Sci-Fi Drama',
        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=800&h=600&fit=crop',
        'director' => 'Michael Bay',
        'status' => 'Post-Production'
    ],
    [
        'title' => 'Shadows of Tomorrow',
        'year' => '2023',
        'role' => 'First Assistant Director',
        'genre' => 'Thriller',
        'image' => 'https://images.unsplash.com/photo-1478720568477-152d9b164e26?w=800&h=600&fit=crop',
        'director' => 'Christopher Nolan',
        'status' => 'Released'
    ],
    [
        'title' => 'Moonlight Chronicles',
        'year' => '2023',
        'role' => 'Second Unit Director',
        'genre' => 'Fantasy Adventure',
        'image' => 'https://images.unsplash.com/photo-1594908900066-3f47337549d8?w=800&h=600&fit=crop',
        'director' => 'Denis Villeneuve',
        'status' => 'Released'
    ],
    [
        'title' => 'Urban Legends',
        'year' => '2022',
        'role' => 'Assistant Director',
        'genre' => 'Horror',
        'image' => 'https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?w=800&h=600&fit=crop',
        'director' => 'Jordan Peele',
        'status' => 'Released'
    ],
    [
        'title' => 'Breaking Dawn',
        'year' => '2022',
        'role' => 'Assistant Director',
        'genre' => 'Action',
        'image' => 'https://images.unsplash.com/photo-1440404653325-ab127d49abc1?w=800&h=600&fit=crop',
        'director' => 'Patty Jenkins',
        'status' => 'Released'
    ],
    [
        'title' => 'The Silent Echo',
        'year' => '2021',
        'role' => 'Assistant Director',
        'genre' => 'Mystery Drama',
        'image' => 'https://images.unsplash.com/photo-1536440136628-849c177e76a1?w=800&h=600&fit=crop',
        'director' => 'Greta Gerwig',
        'status' => 'Released'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($username) ?> - Assistant Director</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

   <?php include('./assets/styles/style.php') ?>
</head>

<body>


    <!-- Navbar -->
    <?php include('./components/navbar.php'); ?>

    <!-- Animated Background -->
    <div class="animated-bg"></div>

    <!-- Loading Screen -->
    <div class="loading-screen">
        <div class="loader-modern">🎬</div>
        <div class="loading-text">LOADING...</div>
    </div>

    <!-- Scroll Progress -->
    <div class="scroll-progress"></div>

    <!-- hero-banner -->
    <?php include('./components/hero-banner.php'); ?>

    <!-- Hero Section -->
    <?php include('./components/hero.php'); ?>

    <!-- About Section -->
    <?php include('./components/about.php'); ?>

    <!-- Experience Section -->
    <?php include('./components/experience.php'); ?>

    <!-- Filmography Section -->
    <?php include('./components/filmography.php'); ?>

    <!-- Contact Section -->
    <?php include('./components/contact.php'); ?>

    <!-- Footer -->
    <?php include('./components/footer.php'); ?>

    <!-- Back to Top -->
    <button class="back-to-top">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Active nav link on scroll
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.navbar-custom .nav-link');

            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (pageYOffset >= sectionTop - 200) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').includes(current)) {
                    link.classList.add('active');
                }
            });
        });

        // Close navbar on link click (mobile)
        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    bootstrap.Collapse.getInstance(navbarCollapse).hide();
                }
            });
        });

        // Loading Screen
        window.addEventListener('load', () => {
            setTimeout(() => {
                document.querySelector('.loading-screen').classList.add('hide');
            }, 1500);
        });

        // Scroll Progress
        window.addEventListener('scroll', () => {
            const winScroll = document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.querySelector('.scroll-progress').style.width = scrolled + '%';
        });

        // Fade Up Animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-up').forEach(el => {
            observer.observe(el);
        });

        // Back to Top
        const backToTop = document.querySelector('.back-to-top');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Form Submit Animation
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            const btn = this.querySelector('button[type="submit"]');
            btn.innerHTML = '<span>Sending...</span><i class="bi bi-hourglass-split"></i>';
            btn.disabled = true;
        });

        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

</body>

</html>
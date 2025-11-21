 <style>
        /* Desktop Navbar Styles */
        .navbar-custom {
            background: rgba(20, 20, 25, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            padding: 15px 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        .navbar-custom .navbar-brand {
            color: var(--gold);
            font-weight: 700;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: 'Playfair Display', serif;
        }

        .navbar-custom .navbar-brand img {
            border: 2px solid var(--gold);
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.4);
        }

        .navbar-custom .nav-link {
            color: var(--text-light);
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s ease;
            position: relative;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .navbar-custom .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gold);
            transition: width 0.3s ease;
        }

        @media (max-width: 991px) {
            .navbar-custom .nav-link::after {
                display: none;
            }

            .navbar-custom .nav-link {
                margin: 5px 0;
                padding: 10px 15px;
            }
        }

        .navbar-custom .nav-link:hover {
            color: var(--gold);
        }

        .navbar-custom .nav-link:hover::after,
        .navbar-custom .nav-link.active::after {
            width: 100%;
        }

        .navbar-custom .nav-link.active {
            color: var(--gold);
        }

        .navbar-toggler {
            border-color: var(--gold);
            padding: 8px 12px;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23D4AF37' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        @media (max-width: 991px) {
            .navbar-collapse {
                background: rgba(20, 20, 25, 0.98);
                backdrop-filter: blur(20px);
                border-radius: 12px;
                margin-top: 15px;
                padding: 15px;
                border: 1px solid rgba(212, 175, 55, 0.2);
            }
        }
    </style>

    <style>
        :root {
            --gold: #D4AF37;
            --gold-light: #F4E5A3;
            --silver: #C0C0C0;
            --dark: #0a0a0f;
            --dark-card: #141419;
            --dark-hover: #1a1a1f;
            --text-light: rgba(255, 255, 255, 0.95);
            --text-muted: rgba(255, 255, 255, 0.65);
            --red-accent: #8B0000;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--dark);
            color: var(--text-light);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Animated Background */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(135deg, #0a0a0f 0%, #141419 50%, #0a0a0f 100%);
        }

        .animated-bg::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            top: -50%;
            left: -50%;
            background:
                radial-gradient(circle at 30% 50%, rgba(212, 175, 55, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 70% 80%, rgba(139, 0, 0, 0.06) 0%, transparent 50%);
            animation: bgRotate 40s linear infinite;
        }

        @keyframes bgRotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Film Strip Decoration */
        .film-strip {
            position: absolute;
            top: 0;
            right: 0;
            width: 40px;
            height: 100%;
            background: repeating-linear-gradient(0deg,
                    rgba(212, 175, 55, 0.1) 0px,
                    rgba(212, 175, 55, 0.1) 10px,
                    transparent 10px,
                    transparent 20px);
            border-left: 2px solid rgba(212, 175, 55, 0.2);
            border-right: 2px solid rgba(212, 175, 55, 0.2);
        }

        /* Glassmorphism Card */
        .glass-card {
            background: rgba(20, 20, 25, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 48px rgba(212, 175, 55, 0.2);
            border-color: rgba(212, 175, 55, 0.4);
        }

        /* Cinematic Hero Banner */
        .cinematic-hero {
            position: relative;
            height: 100vh;
            min-height: 700px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            z-index: 1;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom,
                    rgba(10, 10, 15, 0.7) 0%,
                    rgba(10, 10, 15, 0.5) 50%,
                    rgba(10, 10, 15, 0.9) 100%);
            z-index: 2;
        }

        .hero-content-wrapper {
            position: relative;
            z-index: 3;
            width: 100%;
            text-align: center;
            padding: 0 20px;
        }

        .hero-tag {
            display: inline-block;
            padding: 10px 30px;
            background: rgba(212, 175, 55, 0.15);
            border: 2px solid var(--gold);
            border-radius: 4px;
            color: var(--gold);
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 30px;
            animation: fadeInUp 1s ease 0.2s both;
        }

        .hero-main-title {
            font-size: clamp(3rem, 8vw, 7rem);
            font-weight: 900;
            color: var(--text-light);
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
            text-transform: uppercase;
            letter-spacing: 4px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.8);
            animation: fadeInUp 1s ease 0.4s both;
        }

        .hero-tagline {
            font-size: clamp(1.1rem, 2vw, 1.5rem);
            color: var(--text-muted);
            font-weight: 300;
            font-style: italic;
            margin-bottom: 50px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            animation: fadeInUp 1s ease 0.6s both;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease 0.8s both;
        }

        .hero-scroll-indicator {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            color: var(--text-muted);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: bounce 2s infinite;
        }

        .hero-scroll-indicator i {
            font-size: 1.5rem;
            color: var(--gold);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateX(-50%) translateY(0);
            }

            50% {
                transform: translateX(-50%) translateY(-10px);
            }
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            grid-template-rows: repeat(6, minmax(80px, auto));
            gap: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .hero-main {
            grid-column: 1 / 9;
            grid-row: 1 / 5;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.15), rgba(139, 0, 0, 0.1));
            border: 2px solid rgba(212, 175, 55, 0.3);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }

        .hero-main::before {
            content: '🎬';
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 120px;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .hero-profile {
            grid-column: 9 / 13;
            grid-row: 1 / 4;
            position: relative;
            overflow: hidden;
        }

        .hero-profile img {
            transition: all 0.4s ease;
            filter: grayscale(20%);
        }

        .hero-profile:hover img {
            transform: scale(1.05);
            filter: grayscale(0%);
            box-shadow: 0 12px 32px rgba(212, 175, 55, 0.4) !important;
        }

        .hero-stats {
            grid-column: 9 / 13;
            grid-row: 4 / 5;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .stat-box {
            background: rgba(212, 175, 55, 0.08);
            border: 1px solid rgba(212, 175, 55, 0.3);
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-box:hover {
            background: rgba(212, 175, 55, 0.15);
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--gold);
            font-family: 'Playfair Display', serif;
        }

        .stat-label {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-top: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero-cta {
            grid-column: 1 / 9;
            grid-row: 5 / 7;
            display: flex;
            align-items: center;
            gap: 30px;
            padding: 40px;
        }

        .hero-social {
            grid-column: 9 / 13;
            grid-row: 5 / 7;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 15px;
            padding: 20px;
        }

        /* Typography */
        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            font-weight: 900;
            line-height: 1.1;
            color: var(--gold);
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
            font-family: 'Playfair Display', serif;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .hero-subtitle {
            font-size: clamp(1.1rem, 2vw, 1.4rem);
            color: var(--text-muted);
            font-weight: 300;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
            font-style: italic;
        }

        /* Buttons */
        .btn-modern {
            padding: 16px 40px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: none;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: var(--dark);
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
        }

        .btn-primary-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.5);
            color: var(--dark);
        }

        .btn-outline-modern {
            background: transparent;
            border: 2px solid var(--gold);
            color: var(--gold);
        }

        .btn-outline-modern:hover {
            background: var(--gold);
            color: var(--dark);
            transform: translateY(-3px);
        }

        /* Social Icons */
        .social-icon-modern {
            width: 50px;
            height: 50px;
            border-radius: 4px;
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 1.2rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-icon-modern:hover {
            background: var(--gold);
            color: var(--dark);
            transform: translateY(-5px);
        }

        /* Section Styles */
        section {
            padding: 100px 0;
            position: relative;
        }

        .section-header {
            text-align: center;
            margin-bottom: 80px;
        }

        .section-tag {
            display: inline-block;
            padding: 8px 24px;
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 4px;
            color: var(--gold);
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .section-title {
            font-size: clamp(2.5rem, 4vw, 3.5rem);
            font-weight: 800;
            color: var(--gold);
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--text-muted);
            max-width: 700px;
            margin: 0 auto;
            font-style: italic;
        }

        /* About Section */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-content h3 {
            font-size: 2.2rem;
            color: var(--gold);
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
        }

        .about-content p {
            font-size: 1.05rem;
            line-height: 1.9;
            color: var(--text-muted);
            margin-bottom: 30px;
        }

        .about-image {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            height: 500px;
        }

        .about-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(30%);
            transition: all 0.4s ease;
        }

        .about-image:hover img {
            filter: grayscale(0%);
            transform: scale(1.05);
        }

        /* Experience Timeline */
        .experience-item {
            padding: 30px;
            margin-bottom: 20px;
            position: relative;
        }

        .experience-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background: var(--gold);
        }

        .experience-year {
            color: var(--gold);
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .experience-title {
            font-size: 1.4rem;
            color: var(--text-light);
            margin: 10px 0;
            font-family: 'Playfair Display', serif;
        }

        .experience-desc {
            color: var(--text-muted);
            line-height: 1.7;
        }

        /* Film Projects Grid */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }

        .project-card {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            cursor: pointer;
            height: 450px;
        }

        .project-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.5s ease;
            filter: grayscale(40%);
        }

        .project-card:hover img {
            transform: scale(1.1);
            filter: grayscale(0%);
        }

        .project-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.95), transparent);
            padding: 30px;
            transform: translateY(60%);
            transition: all 0.4s ease;
        }

        .project-card:hover .project-overlay {
            transform: translateY(0);
        }

        .project-status {
            display: inline-block;
            padding: 4px 12px;
            background: var(--gold);
            color: var(--dark);
            font-size: 0.75rem;
            font-weight: 700;
            border-radius: 3px;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .project-title {
            font-size: 1.6rem;
            color: var(--text-light);
            margin-bottom: 8px;
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }

        .project-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 10px;
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .project-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .project-role {
            color: var(--gold);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .project-director {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-top: 5px;
        }

        /* Contact Section */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            padding: 30px;
        }

        .contact-item-icon {
            width: 50px;
            height: 50px;
            border-radius: 4px;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.2), rgba(139, 0, 0, 0.1));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--gold);
            flex-shrink: 0;
        }

        .contact-item-content h4 {
            color: var(--gold);
            font-size: 1.2rem;
            margin-bottom: 8px;
            font-family: 'Playfair Display', serif;
        }

        .contact-item-content p {
            color: var(--text-muted);
            margin: 0;
        }

        .contact-form {
            padding: 50px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            color: var(--gold);
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-control-modern {
            width: 100%;
            padding: 16px 20px;
            background: rgba(20, 20, 25, 0.8);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 4px;
            color: var(--text-light);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control-modern:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
            background: rgba(20, 20, 25, 1);
        }

        textarea.form-control-modern {
            resize: vertical;
            min-height: 150px;
        }

        /* Scroll Animations */
        .fade-up {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Loading Screen */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--dark);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
            z-index: 10000;
            transition: opacity 0.5s, visibility 0.5s;
        }

        .loading-screen.hide {
            opacity: 0;
            visibility: hidden;
        }

        .loader-modern {
            font-size: 80px;
            animation: rotate 2s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .loading-text {
            color: var(--gold);
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            letter-spacing: 2px;
        }

        /* Scroll Progress */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            z-index: 9999;
            transition: width 0.1s ease;
        }

        /* Back to Top */
        .back-to-top {
            position: fixed;
            bottom: 40px;
            right: 40px;
            width: 55px;
            height: 55px;
            border-radius: 4px;
            background: var(--gold);
            color: var(--dark);
            border: none;
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1.3rem;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.4);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .back-to-top.show {
            display: flex;
        }

        .back-to-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.6);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .cinematic-hero {
                min-height: 600px;
            }

            .hero-grid {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
            }

            .hero-main {
                grid-column: 1;
                grid-row: 2;
                padding: 40px;
            }

            .hero-profile {
                grid-column: 1;
                grid-row: 1;
                height: 400px;
            }

            .hero-stats {
                grid-column: 1;
                grid-row: 3;
            }

            .hero-cta {
                grid-column: 1;
                grid-row: 4;
                flex-direction: column;
            }

            .hero-social {
                grid-column: 1;
                grid-row: 5;
            }

            .projects-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }

        @media (max-width: 992px) {
            .cinematic-hero {
                min-height: 500px;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-modern {
                width: 100%;
                max-width: 300px;
            }

            .about-grid,
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .cinematic-hero {
                min-height: 450px;
                height: auto;
                padding: 100px 0 80px;
            }

            .hero-tag {
                font-size: 0.75rem;
                padding: 8px 20px;
                letter-spacing: 2px;
            }

            .hero-main-title {
                font-size: 2.5rem;
                letter-spacing: 2px;
            }

            .hero-tagline {
                font-size: 1rem;
                margin-bottom: 30px;
            }

            .hero-scroll-indicator {
                bottom: 20px;
            }

            section {
                padding: 60px 0;
            }

            .hero-section {
                padding-top: 60px;
            }

            .hero-main {
                padding: 30px;
            }

            .contact-form {
                padding: 30px;
            }

            .project-card {
                height: 400px;
            }
        }

        @media (max-width: 576px) {
            .cinematic-hero {
                min-height: 400px;
            }

            .hero-main-title {
                font-size: 2rem;
            }

            .hero-buttons .btn-modern {
                width: 100%;
                max-width: 100%;
            }

            .hero-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .hero-stats {
                grid-template-columns: 1fr;
            }

            .back-to-top {
                width: 45px;
                height: 45px;
                bottom: 20px;
                right: 20px;
            }

            .project-card {
                height: 350px;
            }
        }

        .hero-content-wrapper,
        .hero-text-content {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            text-align: center;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        @media (max-width: 992px) {
            .hero-main-title {
                font-size: clamp(2rem, 7vw, 2.8rem);
            }

            .hero-tagline {
                font-size: clamp(0.98rem, 3vw, 1.1rem);
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
                gap: 14px;
            }

            .btn-modern {
                width: 100%;
                max-width: 320px;
                box-sizing: border-box;
                justify-content: center;
            }

            .hero-content-wrapper {
                min-height: 50vh;
            }

            .hero-text-content {
                padding-left: 1vw;
                padding-right: 1vw;
            }
        }

        @media (max-width: 600px) {
            .hero-main-title {
                font-size: clamp(1.4rem, 11vw, 2rem);
            }

            .hero-tagline {
                font-size: 1.2rem;
                margin-bottom: 22px;
            }

            .hero-text-content {
                padding: 16px 3vw 0 3vw;
            }

            .btn-modern {
                font-size: 1rem;
                width: 100%;
            }

            .hero-buttons {
                gap: 10px;
            }

            .cinematic-hero {
                min-height: 260px;
            }

            .hero-scroll-indicator {
                margin-top: 20px;
            }
        }
    </style>

    <style>
        @media (max-width: 600px) {
  .cinematic-hero {
    min-height: 85vh !important;
    height: 85vh !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    padding: 0 !important;
  }
  .hero-content-wrapper {
    height: 100%;
    min-height: unset;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
}

    </style>

<style>

@media (max-width: 600px) {
  
  .hero-buttons {
    gap: 8px !important;
    margin-top: 6px;
  }
  .hero-buttons .btn-modern {
    padding: 7px 14px !important;
    font-size: 0.90rem !important;
    min-height: 36px !important;
    max-width: 260px;
    width: 100%;
    border-radius: 3px !important;
  }
  .hero-scroll-indicator {
    font-size: 0.7rem;
    gap: 2px;
    margin-top: 8px;
  }
  .hero-scroll-indicator i { font-size: 1.1rem; }
}


</style>
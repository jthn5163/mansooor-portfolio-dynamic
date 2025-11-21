<footer style="background: rgba(20, 20, 25, 0.95); padding: 60px 0 30px; border-top: 1px solid rgba(212, 175, 55, 0.2);">
        <div class="container">
            <div class="row">
                <!-- About Column -->
                <div class="col-md-4 mb-4">
                    <h5 style="color: var(--gold); margin-bottom: 20px; font-weight: 600; font-family: 'Playfair Display', serif;"><?= htmlspecialchars($username) ?></h5>
                    <p style="color: var(--text-muted); line-height: 1.8;">
                        Assistant Director dedicated to bringing compelling stories to life through exceptional filmmaking.
                    </p>
                    <div style="display: flex; gap: 15px; margin-top: 20px;">
                        <a href="#" class="social-icon-modern"><i class="bi bi-star-fill"></i></a>
                        <a href="#" class="social-icon-modern"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="social-icon-modern"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="col-md-4 mb-4">
                    <h5 style="color: var(--gold); margin-bottom: 20px; font-weight: 600; font-family: 'Playfair Display', serif;">Quick Links</h5>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 10px;"><a href="#home" style="color: var(--text-muted); text-decoration: none; transition: color 0.3s;">Home</a></li>
                        <li style="margin-bottom: 10px;"><a href="#about" style="color: var(--text-muted); text-decoration: none; transition: color 0.3s;">About</a></li>
                        <li style="margin-bottom: 10px;"><a href="#experience" style="color: var(--text-muted); text-decoration: none; transition: color 0.3s;">Experience</a></li>
                        <li style="margin-bottom: 10px;"><a href="#filmography" style="color: var(--text-muted); text-decoration: none; transition: color 0.3s;">Filmography</a></li>
                        <li style="margin-bottom: 10px;"><a href="#contact" style="color: var(--text-muted); text-decoration: none; transition: color 0.3s;">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="col-md-4 mb-4">
                    <h5 style="color: var(--gold); margin-bottom: 20px; font-weight: 600; font-family: 'Playfair Display', serif;">Contact Info</h5>
                    <p style="color: var(--text-muted); margin-bottom: 10px;">
                        <i class="bi bi-envelope" style="color: var(--gold); margin-right: 10px;"></i>
                        alex.thompson@filmmail.com
                    </p>
                    <p style="color: var(--text-muted); margin-bottom: 10px;">
                        <i class="bi bi-telephone" style="color: var(--gold); margin-right: 10px;"></i>
                        +1 (555) 123-4567
                    </p>
                    <p style="color: var(--text-muted); margin-bottom: 10px;">
                        <i class="bi bi-geo-alt" style="color: var(--gold); margin-right: 10px;"></i>
                        Los Angeles, California
                    </p>
                </div>
            </div>
            
            <hr style="border-color: rgba(212, 175, 55, 0.2); margin: 30px 0;">
            
            <div class="text-center">
                <p style="color: var(--text-muted); margin: 0;">
                    &copy; <?= date('Y') ?> <?= htmlspecialchars($username) ?>. All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>
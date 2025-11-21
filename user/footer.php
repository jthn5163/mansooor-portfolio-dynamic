<footer class="bg-dark text-white pt-4 pb-4 mt-5">
    <div class="container">
        <div class="row align-items-start">

            <!-- Google Map (Left) -->
            <div class="col-md-6 mb-3">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.123456789!2d76.267!3d10.8505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba8598abcdef123%3A0xabcdef123456789!2sKerala%2C%20India!5e0!3m2!1sen!2sin!4v1694100000000!5m2!1sen!2sin" 
                    width="100%" 
                    height="250" 
                    style="border:0; border-radius:10px;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Contact Info (Right) -->
            <div class="col-md-6 mb-3">
                <h5 class="text-uppercase mb-3" style="color: var(--primary)">Contact</h5>
                <p class="mb-2"><strong>Address:</strong> Kerala, India</p>
                <p class="mb-2"><strong>Phone:</strong> +91 1234567890</p>
                <p class="mb-2"><strong>Email:</strong> <a href="mailto:example@email.com" class="text-white">example@email.com</a></p>
            </div>

        </div>

        <hr class="border-light">

        <!-- Copyright -->
        <div class="text-center">
            <p class="mb-0">&copy; <?= date('Y') ?> <?= htmlspecialchars($admin['username'] ?? 'Jithin E.V.') ?>. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<section id="filmography" class="fade-up">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Portfolio</span>
                <h2 class="section-title">Filmography</h2>
                <p class="section-subtitle">Selected works from my career as an Assistant Director</p>
            </div>

            <div class="projects-grid">
                <?php foreach($filmProjects as $project): ?>
                <div class="project-card glass-card">
                    <img src="<?= $project['image'] ?>" alt="<?= htmlspecialchars($project['title']) ?>">
                    <div class="project-overlay">
                        <span class="project-status"><?= $project['status'] ?></span>
                        <h3 class="project-title"><?= htmlspecialchars($project['title']) ?></h3>
                        <div class="project-meta">
                            <span><i class="bi bi-calendar3"></i> <?= $project['year'] ?></span>
                            <span><i class="bi bi-tag"></i> <?= $project['genre'] ?></span>
                        </div>
                        <div class="project-role"><?= $project['role'] ?></div>
                        <div class="project-director">Directed by <?= $project['director'] ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
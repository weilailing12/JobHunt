<section class="hero">
    <div class="container">
        <div class="hero-content">
            <span class="eyebrow">Malaysia-based HR consultancy</span>
            <h1>The right talent. The right fit.</h1>
            <p>Executive search, recruitment and HR support built around your business—and the people who move it forward.</p>
            <div class="hero-actions">
                <a class="button button-primary" href="apply_job.php">Explore opportunities</a>
                <a class="button button-light" href="submit_vacancy.php">Hire talent</a>
            </div>
            <ul class="hero-trust" aria-label="Job Hunt service highlights">
                <li>Founded in 2005</li>
                <li>Personalised search</li>
                <li>End-to-end support</li>
            </ul>
        </div>
    </div>
</section>

<div class="stats-strip" aria-label="Company highlights">
    <div class="stat"><strong>20+ years</strong><span>of recruitment experience</span></div>
    <div class="stat"><strong>360° support</strong><span>from sourcing to payroll</span></div>
    <div class="stat"><strong>Multiple sectors</strong><span>from SMEs to multinationals</span></div>
</div>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="eyebrow">What we do</span>
            <h2>Practical HR solutions at every stage</h2>
            <p>Choose focused support for one role, a growing team or an outsourced HR process.</p>
        </div>
        <div class="card-grid">
            <article class="info-card"><span class="card-number">01</span><h3>Executive Search &amp; Selection</h3><p>Targeted, confidential search for senior and specialist positions.</p></article>
            <article class="info-card"><span class="card-number">02</span><h3>Permanent Placement</h3><p>Efficient sourcing and screening for high-quality long-term hires.</p></article>
            <article class="info-card"><span class="card-number">03</span><h3>Contract Outsourcing</h3><p>Flexible staffing support for projects and changing workforce needs.</p></article>
            <article class="info-card"><span class="card-number">04</span><h3>Recruitment Process Outsourcing</h3><p>Scalable recruitment capacity that supports your internal HR team.</p></article>
            <article class="info-card"><span class="card-number">05</span><h3>Payroll Administration</h3><p>Simplified payroll processing and reporting for growing businesses.</p></article>
            <article class="info-card"><span class="card-number">06</span><h3>HR &amp; Corporate Events</h3><p>Practical platforms for HR learning, networking and engagement.</p></article>
        </div>
        <div style="text-align:center; margin-top:32px"><a class="button button-outline" href="solutions.php">View all solutions</a></div>
    </div>
</section>

<section class="section section-white">
    <div class="container split">
        <div class="visual-panel"><img src="assets/hr1.jpg" alt="Recruitment professionals collaborating"></div>
        <div>
            <span class="eyebrow">Why Job Hunt</span>
            <h2>Less hiring noise. More qualified conversations.</h2>
            <ul class="bullet-list">
                <li>We define the role, success factors and search strategy with you.</li>
                <li>We identify, interview and evaluate suitable candidates.</li>
                <li>You receive focused shortlists and clear progress updates.</li>
                <li>We support interviews, references, offers and follow-up.</li>
            </ul>
            <a class="button button-primary" href="methodology.php" style="margin-top:26px">See our methodology</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="eyebrow">For candidates</span>
            <h2>Find opportunities in your field</h2>
            <p>Select a category and submit your CV directly to our recruitment team.</p>
        </div>
        <div class="category-grid">
            <?php
            $categories = [
                ['Sales and Marketing', 'assets/sales-marketing.jpg'], ['Property and Construction', 'assets/property.jpg'],
                ['Oil and Gas', 'assets/oil-gas.jpg'], ['Human Resources and Admin', 'assets/hr1.jpg'],
                ['Finance', 'assets/finance.jpg'], ['Accounting', 'assets/accounting.jpg'],
                ['Business Support', 'assets/business-support.jpg'], ['Information Technology', 'assets/it.jpg']
            ];
            foreach ($categories as [$label, $image]): ?>
                <a class="category-card" href="apply_job.php?category=<?= urlencode($label) ?>">
                    <img src="<?= htmlspecialchars($image) ?>" alt="" loading="lazy">
                    <span><?= htmlspecialchars($label) ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-compact section-white">
    <div class="container">
        <div class="cta-band">
            <div><h2>Ready to make your next move?</h2><p>Tell us whether you are hiring or looking for an opportunity.</p></div>
            <div class="cta-actions"><a class="button button-light" href="submit_vacancy.php">Post a job</a><a class="button button-outline" style="color:white;border-color:rgba(255,255,255,.45);background:transparent" href="apply_job.php">Apply now</a></div>
        </div>
    </div>
</section>

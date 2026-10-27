<?php
$solutions = [
    ['Executive Search & Selection', 'Targeted, confidential search for senior and specialist positions.', ['Role and market mapping', 'Direct candidate approach', 'Structured assessment']],
    ['Permanent Placement', 'Efficient sourcing and screening for high-quality long-term hires.', ['Focused database search', 'Interview screening', 'Client-ready shortlist']],
    ['Contract Outsourcing', 'Flexible staffing support for projects and changing workforce needs.', ['Project-based talent', 'Faster mobilisation', 'Managed hiring process']],
    ['Recruitment Process Outsourcing', 'Scalable recruitment capacity that supports your internal HR team.', ['Sourcing and assessment', 'Interview coordination', 'Long-term or project support']],
    ['Payroll Administration', 'Simplified payroll processing and reporting for growing businesses.', ['Payroll calculations', 'Deductions and withholding', 'Reports and pay documents']],
    ['Career Day', 'High-volume recruitment within a focused period.', ['Multiple vacancies', 'Concentrated screening', 'Scalable event support']],
    ['Behavioural Assessment', 'Recognised psychometric techniques that strengthen hiring decisions.', ['Candidate-job fit', 'Reduced hiring risk', 'Objective insight']],
    ['HR & Corporate Events', 'Practical platforms for HR learning, networking and engagement.', ['Knowledge sharing', 'Industry connections', 'Corporate programmes']],
    ['Contact Centre Outsourcing', 'Inbound and outbound support across sales, service and back-office work.', ['Customer support', 'Sales and enquiries', 'Email and web chat']],
];
?>
<section class="page-hero"><div class="container section-heading"><span class="eyebrow">End-to-end support</span><h1>Our Solutions</h1><p>Flexible recruitment and HR services shaped around your people priorities.</p></div></section>
<section class="section"><div class="container"><div class="card-grid">
    <?php foreach ($solutions as $index => [$title, $summary, $points]): ?>
        <article class="info-card"><span class="card-number"><?= str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT) ?></span><h2><?= htmlspecialchars($title) ?></h2><p><?= htmlspecialchars($summary) ?></p><ul class="bullet-list"><?php foreach ($points as $point): ?><li><?= htmlspecialchars($point) ?></li><?php endforeach; ?></ul></article>
    <?php endforeach; ?>
</div></div></section>
<section class="section-compact section-white"><div class="container"><div class="cta-band"><div><h2>Not sure which service fits?</h2><p>Tell us your goal and we’ll help shape the right approach.</p></div><div class="cta-actions"><a class="button button-light" href="contact.php">Talk to our team</a><a class="button button-outline" style="color:white;border-color:rgba(255,255,255,.45);background:transparent" href="submit_vacancy.php">Submit a vacancy</a></div></div></div></section>

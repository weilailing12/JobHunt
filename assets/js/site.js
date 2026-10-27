document.addEventListener('DOMContentLoaded', () => {
    const navToggle = document.querySelector('.nav-toggle');
    const navigation = document.querySelector('.primary-navigation');
    const closeNavigation = () => {
        if (!navToggle || !navigation) return;
        navToggle.setAttribute('aria-expanded', 'false');
        navigation.classList.remove('is-open');
        document.body.classList.remove('nav-open');
    };
    navToggle?.addEventListener('click', () => {
        const isOpen = navToggle.getAttribute('aria-expanded') === 'true';
        navToggle.setAttribute('aria-expanded', String(!isOpen));
        navigation?.classList.toggle('is-open', !isOpen);
        document.body.classList.toggle('nav-open', !isOpen);
    });
    document.querySelectorAll('.dropdown-toggle').forEach((toggle) => {
        toggle.addEventListener('click', (event) => {
            const dropdown = event.currentTarget.closest('.dropdown');
            const isOpen = dropdown.classList.toggle('is-open');
            event.currentTarget.setAttribute('aria-expanded', String(isOpen));
        });
    });
    navigation?.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeNavigation));
    window.addEventListener('resize', () => { if (window.innerWidth > 820) closeNavigation(); });

    const revealTargets = document.querySelectorAll('.section-heading, .info-card, .method-card, .category-card, .partner-card, .split > *, .cta-band, main > div > section, main > section:not(.hero):not(.page-hero)');
    revealTargets.forEach((element, index) => {
        element.classList.add('reveal');
        element.style.setProperty('--reveal-delay', `${Math.min(index % 4, 3) * 70}ms`);
    });
    if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) { entry.target.classList.add('is-visible'); observer.unobserve(entry.target); }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px' });
        revealTargets.forEach((element) => observer.observe(element));
    } else {
        revealTargets.forEach((element) => element.classList.add('is-visible'));
    }
});

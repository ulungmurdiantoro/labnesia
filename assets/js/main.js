/**
 * Labnesia — main.js
 * Interactivity for the front page
 */
(function () {
  'use strict';

  // ── Nav scroll effect ──────────────────────────────────────────────────────
  const header = document.getElementById('site-header');
  if (header) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    }, { passive: true });
  }

  // ── Mobile nav toggle ──────────────────────────────────────────────────────
  const toggle = document.getElementById('nav-toggle');
  const navLinks = document.getElementById('primary-nav');
  const dropdownWraps = document.querySelectorAll('.nav-dropdown-wrap');

  function closeDropdowns() {
    dropdownWraps.forEach(function (wrap) {
      wrap.classList.remove('open');
      const btn = wrap.querySelector('.nav-dropdown-toggle');
      if (btn) btn.setAttribute('aria-expanded', 'false');
    });
  }

  function closeMobileNav() {
    navLinks.classList.remove('open');
    toggle.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('nav-open');
    closeDropdowns();
  }

  if (toggle && navLinks) {
    toggle.addEventListener('click', function () {
      const isOpen = navLinks.classList.toggle('open');
      toggle.setAttribute('aria-expanded', isOpen);
      document.body.classList.toggle('nav-open', isOpen);
      if (!isOpen) closeDropdowns();
    });

    // Close when a nav link is clicked
    navLinks.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', closeMobileNav);
    });

    // Close on Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && navLinks.classList.contains('open')) {
        closeMobileNav();
      }
    });
  }

  // ── Nav "Layanan" dropdown ─────────────────────────────────────────────────
  dropdownWraps.forEach(function (wrap) {
    const btn = wrap.querySelector('.nav-dropdown-toggle');
    if (!btn) return;
    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      const isOpen = wrap.classList.toggle('open');
      btn.setAttribute('aria-expanded', isOpen);
    });
  });
  document.addEventListener('click', function (e) {
    dropdownWraps.forEach(function (wrap) {
      if (wrap.classList.contains('open') && !wrap.contains(e.target)) {
        wrap.classList.remove('open');
        const btn = wrap.querySelector('.nav-dropdown-toggle');
        if (btn) btn.setAttribute('aria-expanded', 'false');
      }
    });
  });

  // ── Journey map interactivity (hero) ──────────────────────────────────────
  const journeySteps = document.querySelectorAll('.hero-map .journey-step');
  journeySteps.forEach(function (step) {
    step.addEventListener('click', function () {
      journeySteps.forEach(function (s) { s.classList.remove('active'); });
      step.classList.add('active');
    });
  });

  // ── Ladder interactivity (product section) ────────────────────────────────
  const ladderSteps = document.querySelectorAll('.ladder-step');
  ladderSteps.forEach(function (step) {
    step.addEventListener('click', function () {
      ladderSteps.forEach(function (s) { s.classList.remove('active'); });
      step.classList.add('active');
    });
  });

  // ── Smooth anchor scroll with offset for fixed header ─────────────────────
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const headerHeight = header ? header.offsetHeight : 64;
        const top = target.getBoundingClientRect().top + window.scrollY - headerHeight;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

  const reducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // ── Subtle entrance animation on scroll ───────────────────────────────────
  // Broad, name-based selector so any current or future card/item component
  // gets the same fade-up treatment without per-page markup changes.
  if ('IntersectionObserver' in window) {
    const observerOpts = { threshold: 0.12, rootMargin: '0px 0px -48px 0px' };
    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, observerOpts);

    const selector =
      '.problem-card, .give-card, .product-card, .stat-card, .testimonial, ' +
      '.start-option, .funnel-step, .hero-stat, .hero-map, .section-eyebrow, .section-title, ' +
      '[class*="-card"], [class*="-item"]';

    const parentStagger = new WeakMap();
    document.querySelectorAll(selector).forEach(function (el) {
      if (el.classList.contains('will-animate')) return; // avoid double-binding on selector overlap
      el.classList.add('will-animate');

      const parent = el.parentElement;
      let index = 0;
      if (parent) {
        index = parentStagger.get(parent) || 0;
        parentStagger.set(parent, index + 1);
      }
      el.style.transitionDelay = Math.min(index * 0.06, 0.3) + 's';

      observer.observe(el);
    });
  }

  // ── Scroll progress bar ────────────────────────────────────────────────────
  const progressBar = document.createElement('div');
  progressBar.id = 'scroll-progress';
  document.body.appendChild(progressBar);
  function updateScrollProgress() {
    const doc = document.documentElement;
    const scrollable = doc.scrollHeight - doc.clientHeight;
    const pct = scrollable > 0 ? (doc.scrollTop / scrollable) * 100 : 0;
    progressBar.style.width = pct + '%';
  }
  window.addEventListener('scroll', updateScrollProgress, { passive: true });
  updateScrollProgress();

  // ── Animated count-up for stat numbers ─────────────────────────────────────
  if ('IntersectionObserver' in window && !reducedMotion) {
    const counterObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        counterObserver.unobserve(entry.target);
        runCountUp(entry.target);
      });
    }, { threshold: 0.4 });

    document.querySelectorAll('.stat-num, .hero-stat-num').forEach(function (el) {
      counterObserver.observe(el);
    });
  }

  function runCountUp(el) {
    const node = el.childNodes[0];
    if (!node || node.nodeType !== Node.TEXT_NODE) return;
    const match = node.nodeValue.match(/^(\d+)([\s\S]*)$/);
    if (!match) return;
    const target = parseInt(match[1], 10);
    const suffix = match[2];
    if (!target) return;

    const duration = 900;
    let start = null;
    function step(ts) {
      if (start === null) start = ts;
      const progress = Math.min((ts - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      node.nodeValue = Math.round(eased * target) + suffix;
      if (progress < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  // ── Decorative floating lab icons in hero backgrounds ──────────────────────
  const heroFloatIcons = ['flask', 'microscope', 'clipboard-check', 'certificate'];
  document.querySelectorAll('.hero, .page-hero').forEach(function (hero) {
    if (hero.querySelector('.hero-float-icon')) return;
    heroFloatIcons.forEach(function (name) {
      const icon = document.createElement('i');
      icon.className = 'fa-solid fa-' + name + ' hero-float-icon';
      icon.setAttribute('aria-hidden', 'true');
      hero.insertBefore(icon, hero.firstChild);
    });
  });

  // ── Hero glow parallax (idle drift + a slight lean toward the cursor) ──────
  if (!reducedMotion && document.querySelector('.hero-glow, .page-hero')) {
    let mouseX = 0, mouseY = 0;   // normalized -1..1
    let smoothX = 0, smoothY = 0; // eased toward mouseX/Y each frame

    window.addEventListener('mousemove', function (e) {
      mouseX = (e.clientX / window.innerWidth) * 2 - 1;
      mouseY = (e.clientY / window.innerHeight) * 2 - 1;
    }, { passive: true });

    (function tick(ts) {
      smoothX += (mouseX - smoothX) * 0.04;
      smoothY += (mouseY - smoothY) * 0.04;

      const driftX = Math.sin(ts / 4000) * 16;
      const driftY = Math.cos(ts / 5000) * 12;
      const scale = 1 + Math.sin(ts / 4000) * 0.04;

      const root = document.documentElement.style;
      root.setProperty('--glow-x', (driftX + smoothX * 22).toFixed(1) + 'px');
      root.setProperty('--glow-y', (driftY + smoothY * 16).toFixed(1) + 'px');
      root.setProperty('--glow-s', scale.toFixed(3));

      requestAnimationFrame(tick);
    })(0);
  }

})();

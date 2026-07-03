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

  if (toggle && navLinks) {
    toggle.addEventListener('click', function () {
      const isOpen = navLinks.classList.toggle('open');
      toggle.setAttribute('aria-expanded', isOpen);
      if (!isOpen) closeDropdowns();
    });

    // Close when a nav link is clicked
    navLinks.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        navLinks.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        closeDropdowns();
      });
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

  // ── Subtle entrance animation on scroll ───────────────────────────────────
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

    // Elements to animate in
    document.querySelectorAll(
      '.problem-card, .give-card, .product-card, .stat-card, .testimonial, ' +
      '.start-option, .funnel-step, .hero-stat'
    ).forEach(function (el) {
      el.classList.add('will-animate');
      observer.observe(el);
    });
  }

})();

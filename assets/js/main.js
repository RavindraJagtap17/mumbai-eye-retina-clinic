/* main.js — interactions */
(function () {
  'use strict';

  // ---- Sticky header shadow ----
  var header = document.getElementById('siteHeader');
  if (header) {
    var onScroll = function () {
      header.classList.toggle('scrolled', window.scrollY > 10);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  // ---- Mobile nav ----
  var toggle = document.getElementById('navToggle');
  var nav = document.getElementById('mainNav');
  if (toggle && nav) {
    var overlay = document.createElement('div');
    overlay.className = 'nav-overlay';
    document.body.appendChild(overlay);

    var close = function () {
      nav.classList.remove('open');
      overlay.classList.remove('show');
      document.body.classList.remove('nav-open');
      toggle.setAttribute('aria-expanded', 'false');
    };
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('open');
      overlay.classList.toggle('show', open);
      document.body.classList.toggle('nav-open', open);
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    overlay.addEventListener('click', close);

    // Mobile submenu accordions
    nav.querySelectorAll('.has-children > a').forEach(function (a) {
      a.addEventListener('click', function (e) {
        if (window.innerWidth <= 860) {
          var li = a.parentElement;
          // allow real navigation only if it has a real href and is already open
          if (li.querySelector('.submenu')) {
            e.preventDefault();
            li.classList.toggle('open');
          }
        }
      });
    });
  }

  // ---- FAQ accordion ----
  document.querySelectorAll('.faq-q').forEach(function (q) {
    q.addEventListener('click', function () {
      var item = q.parentElement;
      var ans = item.querySelector('.faq-a');
      var isOpen = item.classList.toggle('open');
      ans.style.maxHeight = isOpen ? ans.scrollHeight + 'px' : '0';
    });
  });

  // ---- Reveal on scroll ----
  var reveals = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && reveals.length) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (en.isIntersecting) { en.target.classList.add('in'); io.unobserve(en.target); }
      });
    }, { threshold: 0.12 });
    reveals.forEach(function (el) { io.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add('in'); });
  }

  // ---- Live captcha refresh hint (re-focus on error) ----
  var capInput = document.getElementById('captcha_answer');
  if (capInput && capInput.dataset.error === '1') { capInput.focus(); }

  // ---- Real images in placeholder slots ----
  // Add a data-src="assets/img/your-photo.jpg" attribute to any .img-slot or
  // .doctor-photo and it is shown automatically (no CSS editing needed).
  document.querySelectorAll('[data-src]').forEach(function (el) {
    var src = el.getAttribute('data-src');
    if (!src) return;
    el.style.backgroundImage = 'url("' + src + '")';
    el.style.backgroundSize = 'cover';
    el.style.backgroundPosition = 'center';
    el.style.border = 'none';
    el.classList.add('has-image');
  });
})();

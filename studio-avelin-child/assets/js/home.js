/* ===========================================================================
   Studio Avelin — site behaviour
   Vanilla JS, no dependencies, no build step.
   - scroll state (body.is-scrolled, header.is-stuck, corner marks)
   - hero headline word-reveal + staggered section reveals
   - sliding lime nav indicator
   - mobile navigation
   - smooth anchor scrolling with sticky-header offset
   - one signature moment: the hero portrait drifts gently on scroll
   =========================================================================== */
(function () {
  "use strict";

  var reduceMotion =
    window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  /* ------------------------------------------------------- Scroll state --- */
  function initScrollState() {
    var header = document.getElementById("sa-header");
    var apply = function () {
      var s = window.scrollY > 40;
      document.body.classList.toggle("is-scrolled", s);
      if (header) header.classList.toggle("is-stuck", s);
    };
    apply();
    window.addEventListener("scroll", apply, { passive: true });
  }

  /* --------------------------------------------------- Hero word reveal --- */
  function initHero() {
    var hero = document.querySelector(".sa-hero");
    if (!hero) return;
    if (reduceMotion) { hero.classList.add("is-in"); return; }
    document.body.classList.add("anim");
    requestAnimationFrame(function () {
      requestAnimationFrame(function () { hero.classList.add("is-in"); });
    });
  }

  /* ----------------------------------------------------------- Reveal --- */
  function initReveal() {
    var items = document.querySelectorAll(".sa-reveal");
    if (!items.length) return;

    if (!("IntersectionObserver" in window) || reduceMotion) {
      for (var i = 0; i < items.length; i++) items[i].classList.add("is-visible");
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
          }
        });
      },
      { rootMargin: "0px 0px -10% 0px", threshold: 0.15 }
    );

    for (var j = 0; j < items.length; j++) observer.observe(items[j]);
  }

  /* ------------------------------------ Sliding lime nav indicator --- */
  function initNavIndicator() {
    var header = document.getElementById("sa-header");
    if (!header) return;
    var nav = header.querySelector("[data-sa-nav]");
    if (!nav) return;
    var links = nav.querySelectorAll(".sa-front-nav__link");
    var indicator = nav.querySelector(".sa-nav-baseline__indicator");
    if (!indicator) return;

    function activeLink() { return nav.querySelector(".sa-front-nav__link.is-active"); }

    function move(target) {
      if (!target) { indicator.style.opacity = "0"; return; }
      var navRect = nav.getBoundingClientRect();
      var linkRect = target.getBoundingClientRect();
      indicator.style.opacity = "1";
      indicator.style.transform =
        "translate3d(" + (linkRect.left - navRect.left) + "px, 0, 0) scaleX(" + linkRect.width + ")";
    }

    var current = activeLink();
    if (current) setTimeout(function () { move(current); }, 60);
    else indicator.style.opacity = "0";

    links.forEach(function (link) {
      link.addEventListener("mouseenter", function () { move(this); });
    });
    nav.addEventListener("mouseleave", function () { move(activeLink()); });
    window.addEventListener("resize", function () {
      var a = activeLink();
      if (a) move(a);
    });
  }

  /* -------------------------------------------------------- Mobile nav --- */
  function initNav() {
    var toggle = document.querySelector("[data-sa-nav-toggle]");
    var mobileMenu = document.querySelector("[data-sa-mobile-menu]");
    if (!toggle || !mobileMenu) return;
    var toggleLabel = toggle.querySelector(".sa-nav-toggle__label");

    var close = function () {
      mobileMenu.classList.remove("is-open");
      document.documentElement.classList.remove("sa-menu-open");
      document.body.classList.remove("sa-menu-open");
      toggle.setAttribute("aria-expanded", "false");
      toggle.setAttribute("aria-label", "Menü öffnen");
      if (toggleLabel) toggleLabel.textContent = "Menü";
    };

    toggle.addEventListener("click", function (e) {
      e.stopPropagation();
      var open = mobileMenu.classList.toggle("is-open");
      document.documentElement.classList.toggle("sa-menu-open", open);
      document.body.classList.toggle("sa-menu-open", open);
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
      toggle.setAttribute("aria-label", open ? "Menü schließen" : "Menü öffnen");
      if (toggleLabel) toggleLabel.textContent = open ? "Schließen" : "Menü";
    });

    mobileMenu.addEventListener("click", function (event) {
      if (event.target && event.target.closest("a")) close();
    });
    document.addEventListener("click", function (e) {
      if (!mobileMenu.contains(e.target) && !toggle.contains(e.target)) close();
    });
    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape") close();
    });
    window.addEventListener("resize", function () {
      if (window.innerWidth >= 900) close();
    });
  }

  /* ------------------------------------------------ Smooth anchor jumps --- */
  function initAnchors() {
    var header = document.getElementById("sa-header");
    document.addEventListener("click", function (event) {
      var link = event.target && event.target.closest('a[href*="#"]');
      if (!link) return;
      var href = link.getAttribute("href") || "";
      var hashIndex = href.indexOf("#");
      if (hashIndex < 0) return;
      var id = href.slice(hashIndex + 1);
      if (!id) return;
      var path = href.slice(0, hashIndex);
      if (path && path !== window.location.pathname && path !== "/" && path.charAt(0) !== "#") {
        if (path.indexOf(window.location.origin) !== 0) return;
      }
      var target = document.getElementById(id);
      if (!target) return;
      event.preventDefault();
      var offset = header ? header.getBoundingClientRect().height : 0;
      var top = target.getBoundingClientRect().top + window.scrollY - offset + 1;
      window.scrollTo({ top: top, behavior: reduceMotion ? "auto" : "smooth" });
      if (history.replaceState) history.replaceState(null, "", "#" + id);
    });
  }

  /* --------------------------------------------- Signature: hero drift --- */
  function initHeroDrift() {
    if (reduceMotion) return;
    var img = document.querySelector("[data-sa-parallax] img");
    if (!img) return;
    var hero = document.querySelector(".sa-hero");
    var ticking = false;
    var update = function () {
      ticking = false;
      var rect = hero.getBoundingClientRect();
      if (rect.bottom < 0 || rect.top > window.innerHeight) return;
      var y = Math.min(window.scrollY, window.innerHeight || 1);
      img.style.transform = "translate3d(0," + (y * -0.06).toFixed(1) + "px,0)";
    };
    window.addEventListener("scroll", function () {
      if (!ticking) { ticking = true; requestAnimationFrame(update); }
    }, { passive: true });
    update();
  }

  function boot() {
    initScrollState();
    initHero();
    initReveal();
    initNavIndicator();
    initNav();
    initAnchors();
    initHeroDrift();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();

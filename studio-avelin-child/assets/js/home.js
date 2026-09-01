/* ===========================================================================
   Studio Avelin — homepage behaviour
   Vanilla JS only. No dependencies, no build step.
   - IntersectionObserver reveal animations (staggered)
   - sticky header + sliding lime nav indicator
   - mobile navigation
   - smooth anchor scrolling with sticky-header offset
   - one signature moment: the hero portrait drifts gently on scroll
   =========================================================================== */
(function () {
  "use strict";

  var reduceMotion =
    window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;

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
      { rootMargin: "0px 0px -12% 0px", threshold: 0.12 }
    );

    for (var j = 0; j < items.length; j++) observer.observe(items[j]);
  }

  /* ------------------------------------ Sticky header & baseline indicator --- */
  function initHeader() {
    var header = document.getElementById("sa-header");
    if (!header) return;

    var onScroll = function () {
      header.classList.toggle("is-stuck", window.scrollY > 8);
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });

    var nav = header.querySelector("[data-sa-nav]");
    if (!nav) return;

    var links = nav.querySelectorAll(".sa-front-nav__link");
    var indicator = nav.querySelector(".sa-nav-baseline__indicator");
    if (!indicator) return;

    function getActiveLink() {
      return nav.querySelector(".sa-front-nav__link.is-active");
    }

    function updateIndicator(targetLink) {
      if (!targetLink) {
        indicator.style.opacity = "0";
        return;
      }
      var navRect = nav.getBoundingClientRect();
      var linkRect = targetLink.getBoundingClientRect();
      indicator.style.opacity = "1";
      indicator.style.transform =
        "translate3d(" + (linkRect.left - navRect.left) + "px, 0, 0) scaleX(" + linkRect.width + ")";
    }

    var activeLink = getActiveLink();
    if (activeLink) {
      setTimeout(function () { updateIndicator(activeLink); }, 50);
    } else {
      indicator.style.opacity = "0";
    }

    links.forEach(function (link) {
      link.addEventListener("mouseenter", function () { updateIndicator(this); });
    });

    nav.addEventListener("mouseleave", function () {
      updateIndicator(getActiveLink());
    });

    window.addEventListener("resize", function () {
      var currentActive = getActiveLink();
      if (currentActive) updateIndicator(currentActive);
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
    var portrait = document.querySelector(".sa-hero__portrait");
    var hero = document.querySelector(".sa-hero");
    if (!portrait || !hero) return;

    var ticking = false;
    var update = function () {
      var rect = hero.getBoundingClientRect();
      if (rect.bottom < 0 || rect.top > window.innerHeight) {
        ticking = false;
        return;
      }
      var progress = Math.min(1, Math.max(0, -rect.top / (window.innerHeight || 1)));
      portrait.style.transform = "translate3d(0, " + (progress * -28).toFixed(2) + "px, 0)";
      ticking = false;
    };

    window.addEventListener(
      "scroll",
      function () {
        if (!ticking) {
          ticking = true;
          window.requestAnimationFrame(update);
        }
      },
      { passive: true }
    );
    update();
  }

  function boot() {
    initReveal();
    initHeader();
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

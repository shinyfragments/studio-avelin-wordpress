/* ===========================================================================
   Studio Avelin — homepage behaviour
   Vanilla JS only. No dependencies, no build step.
   - generative Canvas 2D hero field (particles + layered ribbons + structure)
   - IntersectionObserver reveal animations
   - smooth anchor scrolling with sticky-header offset
   - mobile navigation
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

  /* ------------------------------------------------ Sticky header & Baseline indicator --- */
  function initHeader() {
    var header = document.getElementById("sa-header");
    if (!header) return;

    var nav = header.querySelector("[data-sa-nav]");
    if (nav) {
      var links = nav.querySelectorAll(".sa-front-nav__link");
      var indicator = nav.querySelector(".sa-nav-baseline__indicator");

      function getActiveLink() {
        return nav.querySelector(".sa-front-nav__link.is-active");
      }

      function updateIndicator(targetLink) {
        if (!indicator) return;
        if (!targetLink) {
          indicator.style.opacity = "0";
          return;
        }
        var navRect = nav.getBoundingClientRect();
        var linkRect = targetLink.getBoundingClientRect();

        var left = linkRect.left - navRect.left;
        var width = linkRect.width;

        indicator.style.opacity = "1";
        indicator.style.transform = "translateX(" + left + "px)";
        indicator.style.width = width + "px";
      }

      var activeLink = getActiveLink();
      if (activeLink) {
        setTimeout(function() {
          updateIndicator(activeLink);
        }, 50);
      } else {
        if (indicator) indicator.style.opacity = "0";
      }

      links.forEach(function(link) {
        link.addEventListener("mouseenter", function() {
          updateIndicator(this);
        });
      });

      nav.addEventListener("mouseleave", function() {
        var currentActive = getActiveLink();
        if (currentActive) {
          updateIndicator(currentActive);
        } else {
          if (indicator) indicator.style.opacity = "0";
        }
      });

      window.addEventListener("resize", function() {
        var currentActive = getActiveLink();
        if (currentActive) updateIndicator(currentActive);
      });
    }
  }

  /* -------------------------------------------------------- Mobile nav --- */
  function initNav() {
    var toggle = document.querySelector("[data-sa-nav-toggle]");
    var mobileMenu = document.querySelector("[data-sa-mobile-menu]");
    if (!toggle || !mobileMenu) return;

    var close = function () {
      mobileMenu.classList.remove("is-open");
      toggle.setAttribute("aria-expanded", "false");
    };

    toggle.addEventListener("click", function (e) {
      e.stopPropagation();
      var open = mobileMenu.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
    });

    mobileMenu.addEventListener("click", function (event) {
      if (event.target && event.target.closest("a")) close();
    });

    document.addEventListener("click", function (e) {
      if (!mobileMenu.contains(e.target) && !toggle.contains(e.target)) {
        close();
      }
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

      // Only intercept in-page links.
      var path = href.slice(0, hashIndex);
      if (path && path !== window.location.pathname && path !== "/" && path.charAt(0) !== "#") {
        if (path.indexOf(window.location.origin) !== 0) return;
      }

      var target = document.getElementById(id);
      if (!target) return;

      event.preventDefault();
      var offset = header ? header.getBoundingClientRect().height : 0;
      var top = target.getBoundingClientRect().top + window.scrollY - offset + 1;

      window.scrollTo({
        top: top,
        behavior: reduceMotion ? "auto" : "smooth"
      });

      if (history.replaceState) history.replaceState(null, "", "#" + id);
    });
  }

  /* ------------------------------------------------ Generative hero field ---
     Layered flow field: fine wave bands (main element), advected streamline
     traces, secondary particles and restrained lime signal accents.
     ------------------------------------------------------------------------ */
  function initHero() {
    var canvas = document.getElementById("sa-hero-canvas");
    if (!canvas || !canvas.getContext) return;

    var ctx = canvas.getContext("2d");
    var wrap = canvas.parentNode;

    var INK = "21, 25, 34";
    var LIME = "199, 240, 0";

    var width = 0;
    var height = 0;
    var dpr = 1;
    var small = false;
    var step = 18;

    var bands = [];
    var traces = [];
    var particles = [];
    var nodes = [];
    var bursts = [];

    var inkFade = null;
    var limeFade = null;
    var hazeFade = null;

    var time = 0;
    var rafId = null;
    var running = false;
    var last = 0;

    function rand(min, max) {
      return min + Math.random() * (max - min);
    }

    /* Direction field: layered sines — cheap procedural noise approximation. */
    function flowAngle(x, y, t) {
      var a =
        Math.sin(x * 0.0021 + t * 0.22) * 0.55 +
        Math.sin(y * 0.0034 - t * 0.17) * 0.42 +
        Math.sin((x + y) * 0.0013 + t * 0.11) * 0.34;
      return a * 0.62;
    }

    /* Vertical displacement of a band line at x — big smooth S-curves. */
    function waveY(band, x, t) {
      var p = band.phase + t * band.speed;
      return (
        Math.sin(x * band.f1 + p) * band.a1 +
        Math.sin(x * band.f2 - p * 1.37 + band.o2) * band.a2 +
        Math.sin(x * band.f3 + p * 0.61 + band.o3) * band.a3
      );
    }

    function buildGradients() {
      /* Continuous left→right density ramp: soft (not zero) alpha at the very
         left edge so the field visibly passes behind the typography. */
      inkFade = ctx.createLinearGradient(0, 0, width, 0);
      inkFade.addColorStop(0, "rgba(" + INK + ", 0.52)");
      inkFade.addColorStop(0.25, "rgba(" + INK + ", 0.6)");
      inkFade.addColorStop(0.55, "rgba(" + INK + ", 0.8)");
      inkFade.addColorStop(0.7, "rgba(" + INK + ", 0.88)");
      inkFade.addColorStop(1, "rgba(" + INK + ", 1)");

      limeFade = ctx.createLinearGradient(0, 0, width, 0);
      limeFade.addColorStop(0, "rgba(" + LIME + ", 0.12)");
      limeFade.addColorStop(0.35, "rgba(" + LIME + ", 0.34)");
      limeFade.addColorStop(0.7, "rgba(" + LIME + ", 0.66)");
      limeFade.addColorStop(1, "rgba(" + LIME + ", 1)");

      hazeFade = ctx.createLinearGradient(0, 0, width, 0);
      hazeFade.addColorStop(0, "rgba(" + INK + ", 0.34)");
      hazeFade.addColorStop(1, "rgba(" + INK + ", 0.6)");
    }

    function seedBands() {
      bands.length = 0;
      var bandCount = small ? 5 : width < 1100 ? 6 : 8;
      var perBand = small ? 26 : width < 1100 ? 34 : 46;

      for (var b = 0; b < bandCount; b++) {
        var depth = 0.45 + (b / Math.max(1, bandCount - 1)) * 0.55;
        var band = {
          y: height * (0.08 + b * (0.86 / bandCount)) + rand(-26, 26),
          spread: rand(64, 132) * (small ? 0.72 : 1),
          count: Math.round(perBand * rand(0.75, 1.15)),
          a1: rand(26, 74) * depth,
          a2: rand(14, 38) * depth,
          a3: rand(6, 18) * depth,
          f1: rand(0.0016, 0.0031),
          f2: rand(0.0042, 0.0074),
          f3: rand(0.009, 0.014),
          o2: rand(0, 6.283),
          o3: rand(0, 6.283),
          phase: rand(0, 6.283),
          speed: rand(0.16, 0.42) * (b % 2 ? 1 : -1),
          drift: rand(-9, 9),
          alpha: rand(0.09, 0.19) * (0.7 + depth * 0.6) * (small ? 1.6 : 1),
          limeLine: -1,
          lines: []
        };

        for (var i = 0; i < band.count; i++) {
          band.lines.push({
            t: i / Math.max(1, band.count - 1),
            jitter: rand(-8, 8),
            wob: rand(0.4, 1.5),
            wobPhase: rand(0, 6.283),
            alpha: rand(0.45, 1.2),
            wide: Math.random() < 0.08
          });
        }
        bands.push(band);
      }

      /* 3–6 lime flow lines spread across the bands. */
      var limeLines = small ? 4 : 8;
      for (var l = 0; l < limeLines; l++) {
        var bb = bands[Math.floor(Math.random() * bands.length)];
        bb.limeLine = Math.floor(Math.random() * bb.count);
      }
    }

    function seedTraces() {
      traces.length = 0;
      var count = small ? 18 : width < 1100 ? 34 : 50;
      var maxLen = small ? 90 : 150;

      for (var i = 0; i < count; i++) {
        var trail = new Float32Array(maxLen * 2);
        var lime = i % 5 === 0;
        traces.push({
          x: rand(-width * 0.35, width),
          y: rand(height * 0.04, height * 0.96),
          speed: rand(0.8, 1.8) * (lime ? 1.15 : 1),
          len: 0,
          maxLen: maxLen,
          trail: trail,
          lime: lime,
          alpha: lime ? rand(0.55, 0.9) : rand(0.22, 0.5),
          wsize: lime ? rand(0.9, 1.4) : rand(0.6, 1.3)
        });
      }
    }

    function seedParticles() {
      particles.length = 0;
      var area = width * height;
      var cap = small ? 22 : width < 1100 ? 40 : 60;
      var count = Math.max(14, Math.min(cap, Math.round(area / 26000)));

      for (var i = 0; i < count; i++) {
        particles.push({
          x: rand(0, width),
          y: rand(0, height),
          size: rand(0.3, 0.95),
          speed: rand(0.2, 0.95),
          depth: rand(0.35, 1),
          lime: Math.random() < 0.09
        });
      }
    }

    function seedNodes() {
      nodes.length = 0;
      var count = small ? 6 : 10;
      for (var i = 0; i < count; i++) {
        var bx = i < 2 ? rand(0.04, 0.3) : rand(0.34, 1.0);
        nodes.push({
          bx: bx,
          band: Math.floor(Math.random() * Math.max(1, bands.length)),
          line: Math.random(),
          r: rand(1.6, 3.4) * (bx < 0.35 ? 0.5 : 1),
          pulse: rand(0, 6.283),
          speed: rand(0.5, 1.3),
          ring: bx > 0.35 && Math.random() < 0.4
        });
      }
      bursts.length = 0;
    }

    function resize() {
      var rect = wrap.getBoundingClientRect();
      width = Math.max(1, Math.round(rect.width));
      height = Math.max(1, Math.round(rect.height));
      dpr = Math.min(window.devicePixelRatio || 1, 2);
      small = width < 760;
      step = small ? 18 : width < 1100 ? 14 : 12;

      canvas.width = Math.round(width * dpr);
      canvas.height = Math.round(height * dpr);
      canvas.style.width = width + "px";
      canvas.style.height = height + "px";
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
      ctx.lineCap = "round";
      ctx.lineJoin = "round";

      buildGradients();
      seedBands();
      seedTraces();
      seedParticles();
      seedNodes();
    }

    /* Layer 1 — very subtle haze: sparse verticals + measure ticks. */
    function drawStructure() {
      ctx.save();
      ctx.strokeStyle = hazeFade;
      ctx.lineWidth = 1;
      ctx.globalAlpha = 0.05;

      var cols = small ? 3 : 6;
      for (var i = 1; i <= cols; i++) {
        var x = Math.round((width / (cols + 1)) * i) + 0.5;
        ctx.beginPath();
        ctx.moveTo(x, height * 0.06);
        ctx.lineTo(x, height * 0.94);
        ctx.stroke();
      }

      ctx.globalAlpha = 0.09;
      var ticks = small ? 6 : 14;
      for (var j = 0; j < ticks; j++) {
        var ty = height * 0.12 + (height * 0.76 * j) / (ticks - 1);
        ctx.beginPath();
        ctx.moveTo(width - 26, ty);
        ctx.lineTo(width - 14, ty);
        ctx.stroke();
      }
      ctx.restore();
    }

    /* Layer 2 + 3 — the main element: many fine flowing wave lines. */
    function drawBands(t) {
      var startX = -step * 6;
      var b, band, i, line, x, y, first, k, travel, wob;

      for (b = 0; b < bands.length; b++) {
        band = bands[b];
        travel = t * band.speed * 26;

        for (i = 0; i < band.lines.length; i++) {
          line = band.lines[i];
          var lime = i === band.limeLine;
          var base =
            band.y +
            (line.t - 0.5) * band.spread +
            line.jitter +
            Math.sin(t * 0.35 + line.wobPhase) * band.drift * 0.25;

          ctx.beginPath();
          first = true;
          for (x = startX; x <= width + step; x += step) {
            wob =
              Math.sin((x + travel) * 0.0125 + line.wobPhase + t * 0.7) *
              line.wob *
              2.1;
            y =
              base +
              waveY(band, x + travel, t) * (0.72 + line.t * 0.56) +
              wob;
            if (first) {
              ctx.moveTo(x, y);
              first = false;
            } else {
              ctx.lineTo(x, y);
            }
          }

          if (lime) {
            ctx.strokeStyle = limeFade;
            ctx.globalAlpha = Math.min(1, 0.42 + line.alpha * 0.22);
            ctx.lineWidth = 1.25;
          } else {
            ctx.strokeStyle = inkFade;
            ctx.globalAlpha = band.alpha * line.alpha;
            ctx.lineWidth = line.wide ? 1.7 : 0.95;
          }
          ctx.stroke();
        }
      }
      ctx.globalAlpha = 1;
    }

    /* Layer 5a — streamline traces advected through the direction field. */
    function drawTraces(t, dt) {
      var i, k, tr, ang, n, idx;

      for (i = 0; i < traces.length; i++) {
        tr = traces[i];
        ang = flowAngle(tr.x, tr.y, t);
        tr.x += Math.cos(ang) * tr.speed * dt * 62 + tr.speed * dt * 44;
        tr.y += Math.sin(ang) * tr.speed * dt * 62;

        if (tr.x > width + 60 || tr.y < -80 || tr.y > height + 80) {
          tr.x = rand(-width * 0.35, width * 0.06);
          tr.y = rand(height * 0.05, height * 0.95);
          tr.len = 0;
        }

        n = tr.maxLen;
        if (tr.len < n) {
          idx = tr.len * 2;
          tr.trail[idx] = tr.x;
          tr.trail[idx + 1] = tr.y;
          tr.len++;
        } else {
          for (k = 0; k < (n - 1) * 2; k++) tr.trail[k] = tr.trail[k + 2];
          tr.trail[(n - 1) * 2] = tr.x;
          tr.trail[(n - 1) * 2 + 1] = tr.y;
        }

        if (tr.len < 3) continue;

        ctx.beginPath();
        ctx.moveTo(tr.trail[0], tr.trail[1]);
        for (k = 1; k < tr.len; k++) ctx.lineTo(tr.trail[k * 2], tr.trail[k * 2 + 1]);
        ctx.strokeStyle = tr.lime ? limeFade : inkFade;
        ctx.globalAlpha = tr.alpha;
        ctx.lineWidth = tr.wsize;
        ctx.stroke();

        /* head marker — a small signal point riding the flow */
        ctx.beginPath();
        ctx.arc(tr.x, tr.y, tr.lime ? 2.1 : 1.2, 0, 6.283);
        ctx.fillStyle = tr.lime ? "rgba(" + LIME + ", 0.95)" : "rgba(" + INK + ", 0.5)";
        ctx.globalAlpha = tr.x > width * 0.35 ? 1 : 0.55;
        ctx.fill();
      }
      ctx.globalAlpha = 1;
    }

    /* Layer 4 — secondary particles following the same direction field. */
    function drawParticles(t, dt) {
      var i, p, ang, fade;
      for (i = 0; i < particles.length; i++) {
        p = particles[i];
        ang = flowAngle(p.x, p.y, t);
        p.x += (Math.cos(ang) * 0.8 + 0.7) * p.speed * dt * 46;
        p.y += Math.sin(ang) * p.speed * dt * 46;

        if (p.x > width + 8) p.x = -8;
        if (p.y < -8) p.y = height + 8;
        else if (p.y > height + 8) p.y = -8;

        fade = small ? 1 : 0.72 + 0.28 * Math.min(1, Math.max(0, p.x / (width * 0.8)));
        if (fade <= 0.01) continue;

        ctx.beginPath();
        ctx.arc(p.x, p.y, p.size, 0, 6.283);
        ctx.fillStyle = p.lime
          ? "rgba(" + LIME + ", " + (0.5 * fade).toFixed(3) + ")"
          : "rgba(" + INK + ", " + (0.22 * p.depth * fade).toFixed(3) + ")";
        ctx.fill();
      }
    }

    /* Layer 5b — lime nodes and rare micro-bursts sitting on the flow. */
    function drawNodes(t) {
      var i, nd, band, x, y, pulse, travel;

      for (i = 0; i < nodes.length; i++) {
        nd = nodes[i];
        band = bands[nd.band % Math.max(1, bands.length)];
        if (!band) continue;
        travel = t * band.speed * 26;
        x = width * nd.bx;
        y =
          band.y +
          (nd.line - 0.5) * band.spread +
          waveY(band, x + travel, t) * (0.72 + nd.line * 0.56);

        pulse = 0.5 + 0.5 * Math.sin(t * nd.speed * 2 + nd.pulse);

        ctx.beginPath();
        ctx.arc(x, y, nd.r * (0.75 + pulse * 0.45), 0, 6.283);
        ctx.fillStyle =
          "rgba(" +
          LIME +
          ", " +
          ((0.5 + pulse * 0.45) * (nd.bx < 0.35 ? 0.3 : 1)).toFixed(3) +
          ")";
        ctx.fill();

        if (nd.ring) {
          ctx.beginPath();
          ctx.arc(x, y, nd.r * (2.2 + pulse * 2.6), 0, 6.283);
          ctx.strokeStyle = "rgba(" + LIME + ", " + (0.3 * (1 - pulse)).toFixed(3) + ")";
          ctx.lineWidth = 1;
          ctx.stroke();
        }

        if (Math.random() < 0.0025) {
          bursts.push({ x: x, y: y, life: 1 });
        }
      }

      for (i = bursts.length - 1; i >= 0; i--) {
        var bu = bursts[i];
        bu.life -= 0.02;
        if (bu.life <= 0) {
          bursts.splice(i, 1);
          continue;
        }
        ctx.beginPath();
        ctx.arc(bu.x, bu.y, (1 - bu.life) * 26 + 2, 0, 6.283);
        ctx.strokeStyle = "rgba(" + LIME + ", " + (bu.life * 0.35).toFixed(3) + ")";
        ctx.lineWidth = 1;
        ctx.stroke();
      }
    }

    function render(dt) {
      ctx.clearRect(0, 0, width, height);
      drawStructure();
      drawBands(time);
      drawParticles(time, dt);
      drawTraces(time, dt);
      drawNodes(time);
    }

    function frame(now) {
      if (!running) return;
      var dt = last ? Math.min(0.05, (now - last) / 1000) : 0.016;
      last = now;
      time += dt;
      render(dt);
      rafId = window.requestAnimationFrame(frame);
    }

    function drawStill() {
      time = 6;
      last = 0;
      render(0.016);
    }

    function start() {
      if (running || reduceMotion) return;
      running = true;
      last = 0;
      rafId = window.requestAnimationFrame(frame);
    }

    function stop() {
      running = false;
      if (rafId) window.cancelAnimationFrame(rafId);
      rafId = null;
    }

    resize();

    if (reduceMotion) drawStill();
    else start();

    var resizeTimer = null;
    window.addEventListener(
      "resize",
      function () {
        if (resizeTimer) window.clearTimeout(resizeTimer);
        resizeTimer = window.setTimeout(function () {
          resize();
          if (reduceMotion) drawStill();
        }, 160);
      },
      { passive: true }
    );

    document.addEventListener("visibilitychange", function () {
      if (document.hidden) stop();
      else start();
    });

    if ("IntersectionObserver" in window) {
      var heroObserver = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) start();
            else stop();
          });
        },
        { threshold: 0 }
      );
      heroObserver.observe(canvas.closest(".sa-hero") || canvas);
    }
  }

  function boot() {
    initReveal();
    initHeader();
    initNav();
    initAnchors();
    initHero();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();

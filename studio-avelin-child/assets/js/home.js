/* ===========================================================================
   Studio Avelin — site behaviour
   Vanilla JS, no dependencies, no build step.
   - scroll state (body.is-scrolled, header.is-stuck, corner marks)
   - generative wave field behind the dark hero
   - hero headline word-reveal + staggered section reveals
   - sliding lime nav indicator
   - mobile navigation
   - smooth anchor scrolling with sticky-header offset
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
    var reveal = function () { hero.classList.add("is-in"); };
    requestAnimationFrame(function () { requestAnimationFrame(reveal); });
    // Fallback: requestAnimationFrame is paused in background tabs, so make
    // sure the headline still appears even if the page loaded unfocused.
    setTimeout(reveal, 450);
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

    // Failsafe: if the observer never fires (page loaded in a background tab,
    // where IntersectionObserver and rAF are paused), reveal everything anyway
    // so nothing is stuck invisible.
    setTimeout(function () {
      var hidden = document.querySelectorAll(".sa-reveal:not(.is-visible)");
      for (var k = 0; k < hidden.length; k++) hidden[k].classList.add("is-visible");
    }, 2200);
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

  /* ------------------------------------------------ Generative hero field ---
     Layered flow field on the dark hero: fine wave bands (main element),
     an occasional advected trace, secondary particles and lime signal nodes.
     ------------------------------------------------------------------------ */
  function initHeroField() {
    var canvas = document.getElementById("sa-hero-canvas");
    if (!canvas || !canvas.getContext) return;

    var ctx = canvas.getContext("2d");
    var wrap = canvas.parentNode;

    var INK = "232, 232, 228";   /* light lines on the dark hero */
    var LIME = "199, 240, 0";

    var width = 0, height = 0, dpr = 1, small = false, step = 18;
    var bands = [], traces = [], particles = [], nodes = [], bursts = [];
    var inkFade = null, limeFade = null, hazeFade = null;
    var time = 0, rafId = null, running = false, last = 0, heroVisible = true;

    function rand(min, max) { return min + Math.random() * (max - min); }

    function flowAngle(x, y, t) {
      var a =
        Math.sin(x * 0.0021 + t * 0.22) * 0.55 +
        Math.sin(y * 0.0034 - t * 0.17) * 0.42 +
        Math.sin((x + y) * 0.0013 + t * 0.11) * 0.34;
      return a * 0.62;
    }

    function waveY(band, x, t) {
      var p = band.phase + t * band.speed;
      return (
        Math.sin(x * band.f1 + p) * band.a1 +
        Math.sin(x * band.f2 - p * 1.37 + band.o2) * band.a2 +
        Math.sin(x * band.f3 + p * 0.61 + band.o3) * band.a3
      );
    }

    function buildGradients() {
      inkFade = ctx.createLinearGradient(0, 0, width, 0);
      inkFade.addColorStop(0, "rgba(" + INK + ", 0.16)");
      inkFade.addColorStop(0.28, "rgba(" + INK + ", 0.26)");
      inkFade.addColorStop(0.58, "rgba(" + INK + ", 0.42)");
      inkFade.addColorStop(0.75, "rgba(" + INK + ", 0.5)");
      inkFade.addColorStop(1, "rgba(" + INK + ", 0.62)");

      limeFade = ctx.createLinearGradient(0, 0, width, 0);
      limeFade.addColorStop(0, "rgba(" + LIME + ", 0.1)");
      limeFade.addColorStop(0.35, "rgba(" + LIME + ", 0.28)");
      limeFade.addColorStop(0.7, "rgba(" + LIME + ", 0.55)");
      limeFade.addColorStop(1, "rgba(" + LIME + ", 0.85)");

      hazeFade = ctx.createLinearGradient(0, 0, width, 0);
      hazeFade.addColorStop(0, "rgba(" + INK + ", 0.12)");
      hazeFade.addColorStop(1, "rgba(" + INK + ", 0.22)");
    }

    function seedBands() {
      bands.length = 0;
      var bandCount = small ? 3 : width < 1100 ? 6 : 8;
      var perBand = small ? 14 : width < 1100 ? 34 : 46;

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
            wide: Math.random() < 0.025
          });
        }
        bands.push(band);
      }

      var limeLines = small ? 4 : 8;
      for (var l = 0; l < limeLines; l++) {
        var bb = bands[Math.floor(Math.random() * bands.length)];
        bb.limeLine = Math.floor(Math.random() * bb.count);
      }
    }

    function seedTraces() {
      traces.length = 0;
      var maxLen = small ? 44 : 132;
      traces.push({
        x: -width * 0.18,
        y: rand(height * 0.14, height * 0.86),
        speed: small ? 0.68 : 0.78,
        len: 0,
        maxLen: maxLen,
        trail: new Float32Array(maxLen * 2),
        alpha: small ? 0.12 : 0.16,
        wsize: small ? 1.05 : 1.2,
        wait: rand(1.8, 3.5)
      });
    }

    function seedParticles() {
      particles.length = 0;
      if (small) return;
      var area = width * height;
      var cap = width < 1100 ? 40 : 60;
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
      bursts.length = 0;
      if (small) return;
      var count = 10;
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
    }

    function resize() {
      var rect = wrap.getBoundingClientRect();
      width = Math.max(1, Math.round(rect.width));
      height = Math.max(1, Math.round(rect.height));
      small = width < 760;
      dpr = Math.min(window.devicePixelRatio || 1, small ? 1 : 2);
      step = small ? 30 : width < 1100 ? 14 : 12;
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

    function drawBands(t) {
      var startX = -step * 6;
      var b, band, i, line, x, y, first, travel, wob;
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
              line.wob * 2.1;
            y = base + waveY(band, x + travel, t) * (0.72 + line.t * 0.56) + wob;
            if (first) { ctx.moveTo(x, y); first = false; }
            else { ctx.lineTo(x, y); }
          }
          if (lime) {
            ctx.strokeStyle = limeFade;
            ctx.globalAlpha = Math.min(1, 0.42 + line.alpha * 0.22);
            ctx.lineWidth = 1.25;
          } else {
            ctx.strokeStyle = inkFade;
            ctx.globalAlpha = band.alpha * line.alpha;
            ctx.lineWidth = line.wide ? 1.25 : 0.95;
          }
          ctx.stroke();
        }
      }
      ctx.globalAlpha = 1;
    }

    function drawTraces(t, dt) {
      var i, k, tr, ang, n, idx, progress, fadeIn, fadeOut, envelope;
      for (i = 0; i < traces.length; i++) {
        tr = traces[i];
        if (tr.wait > 0) { tr.wait -= dt; continue; }
        ang = flowAngle(tr.x, tr.y, t);
        tr.x += Math.cos(ang) * tr.speed * dt * 62 + tr.speed * dt * 44;
        tr.y += Math.sin(ang) * tr.speed * dt * 62;
        if (tr.x > width + 60 || tr.y < -80 || tr.y > height + 80) {
          tr.x = -width * 0.18;
          tr.y = rand(height * 0.14, height * 0.86);
          tr.len = 0;
          tr.wait = rand(7, 11);
          continue;
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
        progress = Math.max(0, Math.min(1, (tr.x + width * 0.18) / (width * 1.18)));
        fadeIn = Math.min(1, progress / 0.16);
        fadeOut = Math.min(1, (1 - progress) / 0.34);
        envelope = Math.max(0, Math.min(fadeIn, fadeOut));
        ctx.strokeStyle = inkFade;
        ctx.globalAlpha = tr.alpha * envelope;
        ctx.lineWidth = tr.wsize;
        ctx.stroke();
      }
      ctx.globalAlpha = 1;
    }

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
          : "rgba(" + INK + ", " + (0.2 * p.depth * fade).toFixed(3) + ")";
        ctx.fill();
      }
    }

    function drawNodes(t) {
      var i, nd, band, x, y, pulse, travel;
      for (i = 0; i < nodes.length; i++) {
        nd = nodes[i];
        band = bands[nd.band % Math.max(1, bands.length)];
        if (!band) continue;
        travel = t * band.speed * 26;
        x = width * nd.bx;
        y = band.y + (nd.line - 0.5) * band.spread + waveY(band, x + travel, t) * (0.72 + nd.line * 0.56);
        pulse = 0.5 + 0.5 * Math.sin(t * nd.speed * 2 + nd.pulse);
        ctx.beginPath();
        ctx.arc(x, y, nd.r * (0.75 + pulse * 0.45), 0, 6.283);
        ctx.fillStyle = "rgba(" + LIME + ", " + ((0.5 + pulse * 0.45) * (nd.bx < 0.35 ? 0.3 : 1)).toFixed(3) + ")";
        ctx.fill();
        if (nd.ring) {
          ctx.beginPath();
          ctx.arc(x, y, nd.r * (2.2 + pulse * 2.6), 0, 6.283);
          ctx.strokeStyle = "rgba(" + LIME + ", " + (0.3 * (1 - pulse)).toFixed(3) + ")";
          ctx.lineWidth = 1;
          ctx.stroke();
        }
        if (!small && Math.random() < 0.0025) bursts.push({ x: x, y: y, life: 1 });
      }
      for (i = bursts.length - 1; i >= 0; i--) {
        var bu = bursts[i];
        bu.life -= 0.02;
        if (bu.life <= 0) { bursts.splice(i, 1); continue; }
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
      drawTraces(time, dt);
      if (!small) {
        drawParticles(time, dt);
        drawNodes(time);
      }
    }

    function frame(now) {
      if (!running) return;
      var dt = last ? Math.min(0.05, (now - last) / 1000) : 0.016;
      last = now;
      time += dt;
      render(dt);
      rafId = window.requestAnimationFrame(frame);
    }

    function drawStill() { time = 6; last = 0; render(0.016); }
    function start() { if (running || reduceMotion) return; running = true; last = 0; rafId = window.requestAnimationFrame(frame); }
    function stop() { running = false; if (rafId) window.cancelAnimationFrame(rafId); rafId = null; }

    resize();
    drawStill();
    if (!reduceMotion) start();

    var resizeTimer = null;
    window.addEventListener("resize", function () {
      if (resizeTimer) window.clearTimeout(resizeTimer);
      resizeTimer = window.setTimeout(function () {
        resize();
        if (reduceMotion) drawStill();
      }, 160);
    }, { passive: true });

    document.addEventListener("visibilitychange", function () {
      if (document.hidden) stop();
      else if (heroVisible) start();
    });

    if ("IntersectionObserver" in window) {
      var heroObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          heroVisible = entry.isIntersecting;
          if (heroVisible) start();
          else stop();
        });
      }, { threshold: 0 });
      heroObserver.observe(canvas.closest(".sa-hero") || canvas);
    }
  }

  function boot() {
    initScrollState();
    initHero();
    initReveal();
    initNavIndicator();
    initNav();
    initAnchors();
    initHeroField();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();

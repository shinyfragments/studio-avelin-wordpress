(function () {
  const page = document.querySelector(".sa-front");

  if (!page) {
    return;
  }

  const revealItems = Array.from(page.querySelectorAll("[data-sa-reveal]"));
  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  if (reduceMotion || !("IntersectionObserver" in window)) {
    revealItems.forEach(function (item) {
      item.classList.add("sa-is-visible");
    });
    return;
  }

  page.classList.add("sa-reveal-enabled");

  revealItems.forEach(function (item, index) {
    item.style.setProperty("--sa-reveal-delay", `${Math.min(index % 4, 3) * 80}ms`);
  });

  const observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) {
          return;
        }

        entry.target.classList.add("sa-is-visible");
        observer.unobserve(entry.target);
      });
    },
    {
      rootMargin: "0px 0px -12% 0px",
      threshold: 0.12
    }
  );

  revealItems.forEach(function (item) {
    observer.observe(item);
  });

  const hero = page.querySelector(".sa-front-hero");
  const heroVisual = page.querySelector("[data-sa-hero-visual] .sa-hero-visual__field");
  const allowParallax = window.matchMedia("(pointer: fine) and (min-width: 760px)").matches;

  if (!hero || !heroVisual || !allowParallax) {
    return;
  }

  let frame = null;

  function setParallax(event) {
    if (frame) {
      window.cancelAnimationFrame(frame);
    }

    frame = window.requestAnimationFrame(function () {
      const bounds = hero.getBoundingClientRect();
      const x = (event.clientX - bounds.left) / bounds.width - 0.5;
      const y = (event.clientY - bounds.top) / bounds.height - 0.5;

      heroVisual.style.setProperty("--sa-parallax-x", (x * 12).toFixed(2));
      heroVisual.style.setProperty("--sa-parallax-y", (y * 9).toFixed(2));
    });
  }

  function resetParallax() {
    heroVisual.style.setProperty("--sa-parallax-x", "0");
    heroVisual.style.setProperty("--sa-parallax-y", "0");
  }

  hero.addEventListener("pointermove", setParallax);
  hero.addEventListener("pointerleave", resetParallax);
})();

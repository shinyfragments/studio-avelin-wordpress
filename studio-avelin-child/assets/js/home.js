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
})();

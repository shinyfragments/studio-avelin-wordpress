document.addEventListener("DOMContentLoaded", function () {
  const slider = document.querySelector("[data-sa-work-slider]");

  if (!slider) {
    return;
  }

  const projects = [
    {
      count: "01",
      title: "StAN",
      type: "AI Notes Web App",
      image: "https://studio-avelin.com/wp-content/uploads/2026/05/01_STAN_notes-app.png",
      alt: "StAN AI Notes Web App Mockup",
      link: "#"
    },
    {
      count: "02",
      title: "StAU",
      type: "Family Vacation Planner",
      image: "https://studio-avelin.com/wp-content/uploads/2026/05/02_STAU-vacation-planer-1.png",
      alt: "StAU Vacation Planner Mockup",
      link: "#"
    },
    {
      count: "03",
      title: "StAT",
      type: "Training Analysis App",
      image: "https://studio-avelin.com/wp-content/uploads/2026/05/03-STAT-trainigs-analysis.png",
      alt: "StAT Training Analysis App Mockup",
      link: "#"
    },
    {
      count: "04",
      title: "StAB",
      type: "Business Portfolio Onepager",
      image: "https://studio-avelin.com/wp-content/uploads/2026/05/04-STAB-business-portfolio-page.png",
      alt: "StAB Business Portfolio Onepager Mockup",
      link: "#"
    }
  ];

  const countEl = slider.querySelector("[data-work-count]");
  const titleEl = slider.querySelector("[data-work-title]");
  const typeEl = slider.querySelector("[data-work-type]");
  const imageEl = slider.querySelector("[data-work-image]");
  const linkEl = slider.querySelector("[data-work-link]");
  const indexButtons = slider.querySelectorAll("[data-work-index]");
  const prevButton = slider.querySelector("[data-work-prev]");
  const nextButton = slider.querySelector("[data-work-next]");

  let currentIndex = 0;

  function renderProject(index, animate = true) {
    const project = projects[index];

    if (!project) {
      return;
    }

    currentIndex = index;

    if (animate) {
      slider.classList.add("is-changing");
    }

    window.setTimeout(function () {
      if (countEl) {
        countEl.textContent = project.count;
      }

      if (titleEl) {
        titleEl.textContent = project.title;
      }

      if (typeEl) {
        typeEl.textContent = project.type;
      }

      if (imageEl) {
        imageEl.src = project.image;
        imageEl.alt = project.alt;
      }

      if (linkEl) {
        linkEl.href = project.link;
      }

      indexButtons.forEach(function (button) {
        const buttonIndex = Number(button.getAttribute("data-work-index"));
        button.classList.toggle("is-active", buttonIndex === currentIndex);
      });

      slider.classList.remove("is-changing");
    }, animate ? 140 : 0);
  }

  indexButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const index = Number(button.getAttribute("data-work-index"));
      renderProject(index);
    });
  });

  if (prevButton) {
    prevButton.addEventListener("click", function () {
      const nextIndex = currentIndex === 0 ? projects.length - 1 : currentIndex - 1;
      renderProject(nextIndex);
    });
  }

  if (nextButton) {
    nextButton.addEventListener("click", function () {
      const nextIndex = currentIndex === projects.length - 1 ? 0 : currentIndex + 1;
      renderProject(nextIndex);
    });
  }

  renderProject(0, false);
});
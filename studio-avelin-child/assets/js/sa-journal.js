(() => {
  const input = document.querySelector('[data-journal-search]');
  if (input) {
    const cards = [...document.querySelectorAll('[data-journal-card]')];
    const empty = document.querySelector('[data-journal-empty]');
    input.addEventListener('input', () => {
      const query = input.value.trim().toLocaleLowerCase();
      let shown = 0;
      cards.forEach((card) => {
        const visible = !query || card.dataset.searchText.toLocaleLowerCase().includes(query);
        card.hidden = !visible;
        if (visible) shown += 1;
      });
      if (empty) empty.hidden = shown !== 0;
    });
  }

  const copy = document.querySelector('[data-copy-link]');
  if (copy) {
    copy.addEventListener('click', async () => {
      try {
        await navigator.clipboard.writeText(window.location.href);
        copy.textContent = 'Copied';
        window.setTimeout(() => { copy.textContent = copy.dataset.defaultLabel; }, 2000);
      } catch (_) {
        copy.textContent = copy.dataset.defaultLabel;
      }
    });
  }

  const links = [...document.querySelectorAll('.sa-toc a')];
  if ('IntersectionObserver' in window && links.length) {
    const targets = links.map((link) => document.querySelector(link.hash)).filter(Boolean);
    const visible = new Set();
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => entry.isIntersecting ? visible.add(entry.target.id) : visible.delete(entry.target.id));
      const active = targets.find((target) => visible.has(target.id));
      if (!active) return;
      links.forEach((link) => {
        const current = link.hash === `#${active.id}`;
        link.parentElement.classList.toggle('is-active', current);
        if (current) link.setAttribute('aria-current', 'location'); else link.removeAttribute('aria-current');
      });
    }, { rootMargin: '-100px 0px -65% 0px' });
    targets.forEach((target) => observer.observe(target));
  }
})();

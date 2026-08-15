const localLegalPages = {
  Impressum: "/maaike-fiebus/impressum/",
  Datenschutz: "/maaike-fiebus/datenschutz/",
};

function setLocalLegalLinks() {
  let updated = 0;

  document.querySelectorAll("footer a").forEach((link) => {
    const href = localLegalPages[link.textContent.trim()];
    if (href) {
      link.href = href;
      updated += 1;
    }
  });

  return updated === Object.keys(localLegalPages).length;
}

if (!setLocalLegalLinks()) {
  const observer = new MutationObserver(() => {
    if (setLocalLegalLinks()) observer.disconnect();
  });

  observer.observe(document.body, { childList: true, subtree: true });
}

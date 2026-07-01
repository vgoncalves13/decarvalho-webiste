const languageStorageKey = 'decarvalho-language';

document.addEventListener('DOMContentLoaded', () => {
  const body = document.body;

  if (!body || body.dataset.page !== 'language-entry') {
    return;
  }

  const note = document.querySelector('[data-auto-redirect-note]');
  const links = Array.from(document.querySelectorAll('[data-language-link]'));
  let redirectTimer = null;
  let cancelled = false;

  links.forEach((link) => {
    const cancelRedirect = () => {
      cancelled = true;

      if (redirectTimer !== null) {
        window.clearTimeout(redirectTimer);
      }

      if (note) {
        note.textContent = 'Automatic redirect cancelled. Choose your language manually.';
      }
    };

    link.addEventListener('mouseenter', cancelRedirect, { once: true });
    link.addEventListener('focus', cancelRedirect, { once: true });
  });

  const savedLanguage = localStorage.getItem(languageStorageKey);
  const browserLanguage = (navigator.language || '').toLowerCase();
  const targetLanguage = savedLanguage || (browserLanguage.startsWith('pt') ? 'pt' : 'de');
  const targetPath = targetLanguage === 'pt' ? '/pt/' : '/de/';

  if (note) {
    note.textContent = targetLanguage === 'pt'
      ? 'Portuguese preference detected. Redirecting to /pt/.'
      : 'German preference detected. Redirecting to /de/.';
  }

  redirectTimer = window.setTimeout(() => {
    if (cancelled) {
      return;
    }

    window.location.assign(targetPath);
  }, 1200);
});

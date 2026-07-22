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
  const languageMap = {
    pt: '/pt/',
    en: '/en/',
    fr: '/fr/',
    de: '/de/',
  };
  const targetLanguage = savedLanguage || detectLanguage(browserLanguage);
  const targetPath = languageMap[targetLanguage] || '/de/';

  if (note) {
    const labelMap = {
      pt: 'Portuguese',
      en: 'English',
      fr: 'French',
      de: 'German',
    };

    note.textContent = `${labelMap[targetLanguage] || 'German'} preference detected. Redirecting to ${targetPath}.`;
  }

  redirectTimer = window.setTimeout(() => {
    if (cancelled) {
      return;
    }

    window.location.assign(targetPath);
  }, 1200);
});

function detectLanguage(browserLanguage) {
  if (browserLanguage.startsWith('pt')) {
    return 'pt';
  }

  if (browserLanguage.startsWith('fr')) {
    return 'fr';
  }

  if (browserLanguage.startsWith('en')) {
    return 'en';
  }

  return 'de';
}

const languageStorageKey = 'decarvalho-language';

document.addEventListener('DOMContentLoaded', () => {
  initMenu();
  initFadeIn();
  initNavShadow();
  initAnchorScroll();
  initLanguagePreference();
  initContactForms();
});

function initMenu() {
  const toggle = document.querySelector('.menu-toggle');
  const navLinks = document.querySelector('.nav-links');

  if (!toggle || !navLinks) {
    return;
  }

  toggle.addEventListener('click', () => {
    const isOpen = navLinks.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', String(isOpen));
  });

  navLinks.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      navLinks.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    });
  });
}

function initFadeIn() {
  const elements = document.querySelectorAll('.fade-in');

  if (!elements.length || !('IntersectionObserver' in window)) {
    elements.forEach((element) => element.classList.add('visible'));
    return;
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  elements.forEach((element) => observer.observe(element));
}

function initNavShadow() {
  const nav = document.querySelector('.site-nav');

  if (!nav) {
    return;
  }

  const onScroll = () => {
    nav.classList.toggle('is-scrolled', window.scrollY > 14);
  };

  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });
}

function initAnchorScroll() {
  document.querySelectorAll('a[href^="#"]').forEach((link) => {
    link.addEventListener('click', (event) => {
      const id = link.getAttribute('href');

      if (!id || id.length < 2) {
        return;
      }

      const target = document.querySelector(id);

      if (!target) {
        return;
      }

      event.preventDefault();
      const top = target.getBoundingClientRect().top + window.scrollY - 80;
      window.scrollTo({ top, behavior: 'smooth' });
    });
  });
}

function initLanguagePreference() {
  document.querySelectorAll('[data-language-link]').forEach((link) => {
    link.addEventListener('click', () => {
      const locale = link.getAttribute('data-language-link');

      if (locale) {
        localStorage.setItem(languageStorageKey, locale);
      }
    });
  });
}

function initContactForms() {
  document.querySelectorAll('[data-contact-form]').forEach((form) => {
    form.addEventListener('submit', async (event) => {
      event.preventDefault();

      const status = form.querySelector('.form-status');
      const submitButton = form.querySelector('.form-submit');
      const buttonLabel = submitButton?.querySelector('span');

      clearStatus(status);

      const formData = new FormData(form);
      const responseConfig = getMessageConfig(form);

      if (!isValidSubmission(formData)) {
        updateStatus(status, responseConfig.invalid, 'error');
        return;
      }

      if (submitButton) {
        submitButton.disabled = true;
      }

      if (buttonLabel) {
        buttonLabel.textContent = responseConfig.loading;
      }

      try {
        const response = await fetch(form.action, {
          method: 'POST',
          body: formData,
          headers: {
            Accept: 'application/json',
          },
        });

        const payload = await response.json();

        if (!response.ok || !payload.ok) {
          const errorMessage = formatFieldErrors(payload.fieldErrors) || payload.message || responseConfig.error;
          updateStatus(status, errorMessage, 'error');
          return;
        }

        form.reset();
        updateStatus(status, payload.message || responseConfig.success, 'success');
      } catch (error) {
        updateStatus(status, responseConfig.error, 'error');
      } finally {
        if (submitButton) {
          submitButton.disabled = false;
        }

        if (buttonLabel) {
          buttonLabel.textContent = responseConfig.submit;
        }
      }
    });
  });
}

function isValidSubmission(formData) {
  const name = (formData.get('name') || '').toString().trim();
  const contact = (formData.get('contact') || '').toString().trim();
  const service = (formData.get('service') || '').toString().trim();
  const message = (formData.get('message') || '').toString().trim();
  const honeypot = (formData.get('company') || '').toString().trim();

  if (honeypot !== '') {
    return false;
  }

  return name.length >= 2 && contact.length >= 3 && service.length >= 2 && message.length >= 12;
}

function getMessageConfig(form) {
  const locale = document.body.getAttribute('data-locale') || 'de';
  const submit = form.querySelector('.form-submit span')?.textContent || '';

  return {
    success: form.dataset.successMessage || '',
    error: form.dataset.errorMessage || '',
    loading: form.dataset.loadingMessage || submit,
    submit,
    invalid: getInvalidMessage(locale),
  };
}

function getInvalidMessage(locale) {
  if (locale.startsWith('pt')) {
    return 'Preencha os campos obrigatórios com informação suficiente.';
  }

  if (locale.startsWith('fr')) {
    return 'Veuillez remplir les champs obligatoires avec suffisamment d’informations.';
  }

  if (locale.startsWith('en')) {
    return 'Please fill in the required fields with enough information.';
  }

  return 'Bitte füllen Sie die Pflichtfelder mit genügend Informationen aus.';
}

function formatFieldErrors(fieldErrors) {
  if (!fieldErrors || typeof fieldErrors !== 'object') {
    return '';
  }

  return Object.values(fieldErrors)
    .filter(Boolean)
    .join(' ');
}

function updateStatus(statusElement, message, type) {
  if (!statusElement) {
    return;
  }

  statusElement.textContent = message;
  statusElement.classList.remove('is-error', 'is-success');
  statusElement.classList.add(type === 'success' ? 'is-success' : 'is-error');
}

function clearStatus(statusElement) {
  if (!statusElement) {
    return;
  }

  statusElement.textContent = '';
  statusElement.classList.remove('is-error', 'is-success');
}

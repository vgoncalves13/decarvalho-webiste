# De Carvalho Site Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Build the approved multilingual PHP site for De Carvalho Service GmbH with separate German and Portuguese pages, centralized configuration, shared assets, and a PHPMailer-backed contact form.

**Architecture:** Keep the public site as mostly static PHP pages with one shared stylesheet and two shared JavaScript files. Store all environment-sensitive business and SMTP data in `config/site.php`, and make `/api/contact.php` the only mail-sending backend endpoint. Root entry stays indexable and human-readable while JS handles gentle language redirection and saved preference behavior.

**Tech Stack:** PHP 8+, Composer autoload, PHPMailer, HTML, CSS, vanilla JavaScript

---

### Task 1: Set up project structure and Composer

**Files:**
- Create: `composer.json`
- Create: `config/site.php`
- Create: `index.php`
- Create: `de/index.php`
- Create: `pt/index.php`
- Create: `api/contact.php`
- Create: `assets/css/main.css`
- Create: `assets/js/site.js`
- Create: `assets/js/language-redirect.js`
- Create: `assets/favicon.svg`
- Delete: `index.html`

- [ ] **Step 1: Add Composer manifest**

```json
{
  "name": "decarvalho/site",
  "description": "Multilingual institutional site for De Carvalho Service GmbH",
  "type": "project",
  "require": {
    "php": "^8.1",
    "phpmailer/phpmailer": "^6.10"
  },
  "autoload": {
    "files": [
      "config/site.php"
    ]
  }
}
```

- [ ] **Step 2: Install dependencies**

Run: `composer install`
Expected: `vendor/` created and `phpmailer/phpmailer` installed

- [ ] **Step 3: Add centralized config**

```php
<?php
return [
    'base_url' => 'https://example.ch',
    'company_name' => 'De Carvalho Service GmbH',
    'destination_email' => 'info@decarvalhoservice.ch',
    'public_phone' => '+41 79 101 31 57',
    'public_phone_href' => '+41791013157',
    'whatsapp_number' => '41791013157',
    'default_from_email' => 'no-reply@example.ch',
    'default_from_name' => 'De Carvalho Service Website',
    'smtp' => [
        'host' => 'smtp.example.ch',
        'port' => 587,
        'username' => 'smtp-user',
        'password' => 'smtp-password',
        'encryption' => 'tls',
    ],
];
```

- [ ] **Step 4: Remove the old single-file HTML entry**

Run: `rm index.html`
Expected: legacy inline implementation removed

- [ ] **Step 5: Commit**

```bash
git add composer.json composer.lock config/site.php index.php de/index.php pt/index.php api/contact.php assets/css/main.css assets/js/site.js assets/js/language-redirect.js assets/favicon.svg
git commit -m "chore: scaffold multilingual PHP site structure"
```

### Task 2: Build shared front-end and localized pages

**Files:**
- Modify: `index.php`
- Modify: `de/index.php`
- Modify: `pt/index.php`
- Modify: `assets/css/main.css`
- Modify: `assets/js/site.js`
- Modify: `assets/js/language-redirect.js`

- [ ] **Step 1: Build root entry page with explicit language choices**

```php
<?php
$config = require __DIR__ . '/config/site.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>...</head>
<body data-page="language-entry">
  <main class="language-entry">
    <a href="<?= htmlspecialchars($config['base_url']) ?>/de/">Deutsch</a>
    <a href="<?= htmlspecialchars($config['base_url']) ?>/pt/">Português</a>
  </main>
  <script src="/assets/js/language-redirect.js" defer></script>
</body>
</html>
```

- [ ] **Step 2: Build localized German and Portuguese pages**

```php
<?php
$config = require __DIR__ . '/../config/site.php';
$locale = 'de-CH'; // pt in the Portuguese file
$currentPath = '/de/'; // /pt/ in the Portuguese file
?>
<!DOCTYPE html>
<html lang="<?= $locale ?>">
<head>...</head>
<body data-locale="<?= $locale ?>" data-contact-endpoint="/api/contact.php">
  ...
</body>
</html>
```

- [ ] **Step 3: Extract and share the existing visual system**

```css
:root {
  --navy: #0b2a5b;
  --red: #d62828;
  --green: #15803d;
}
```

- [ ] **Step 4: Add JS for menu, language preference, scroll effects, and form handling**

```js
document.addEventListener('DOMContentLoaded', () => {
  initMenu();
  initFadeIn();
  initLanguagePreference();
  initContactForm();
});
```

- [ ] **Step 5: Commit**

```bash
git add index.php de/index.php pt/index.php assets/css/main.css assets/js/site.js assets/js/language-redirect.js
git commit -m "feat: add multilingual pages and shared front-end assets"
```

### Task 3: Implement PHPMailer contact flow and anti-spam rules

**Files:**
- Modify: `api/contact.php`
- Modify: `de/index.php`
- Modify: `pt/index.php`
- Modify: `assets/js/site.js`

- [ ] **Step 1: Add server-side validation and honeypot rejection**

```php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Method not allowed']);
    exit;
}
```

- [ ] **Step 2: Configure PHPMailer from central config**

```php
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = $config['smtp']['host'];
$mail->Port = $config['smtp']['port'];
```

- [ ] **Step 3: Submit forms with fetch and localized JSON messages**

```js
const response = await fetch('/api/contact.php', {
  method: 'POST',
  body: formData,
  headers: { Accept: 'application/json' },
});
```

- [ ] **Step 4: Add privacy notice below the forms**

```html
<p class="privacy-note">Ihre Angaben werden nur zur Bearbeitung Ihrer Anfrage verwendet.</p>
```

- [ ] **Step 5: Commit**

```bash
git add api/contact.php de/index.php pt/index.php assets/js/site.js
git commit -m "feat: add PHPMailer contact endpoint with anti-spam"
```

### Task 4: Verify configuration and production readiness

**Files:**
- Modify: `config/site.php`
- Modify: `de/index.php`
- Modify: `pt/index.php`
- Modify: `index.php`

- [ ] **Step 1: Check visible copy against the no-unverified-claims rule**

Run: `rg -n "Versichert|24 Stunden|24h|ganze Schweiz|toda a Suíça|5.0|rating|Abnahmegarantie" index.php de/index.php pt/index.php`
Expected: only deliberate, approved wording remains

- [ ] **Step 2: Validate PHP syntax**

Run: `find . -name '*.php' -print0 | xargs -0 -n1 php -l`
Expected: `No syntax errors detected` for every file

- [ ] **Step 3: Smoke-test assets and structure**

Run: `find . -maxdepth 3 -type f | sort`
Expected: all required public files exist

- [ ] **Step 4: Commit**

```bash
git add config/site.php index.php de/index.php pt/index.php
git commit -m "chore: finalize multilingual site configuration"
```

## Self-Review

- Spec coverage: covered page split, config centralization, root entry behavior, PHPMailer backend, anti-spam, localized copy, shared assets, and privacy note.
- Placeholder scan: no `TODO` or deferred implementation markers are present in tasks.
- Type consistency: paths and function responsibilities match the approved spec.
